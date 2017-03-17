// create the controller and inject Angular's $scope
angular.module('scotchApp').controller('comprobanteRetencionController', function ($scope, $route) {
	$scope.$route = $route;		
	var d = new Date();
	var currDate = d.getDate();
	var currMonth = d.getMonth() + 1;
	var currYear = d.getFullYear();
	var dateStr = currDate + "/" + currMonth + "/" + currYear;		

	jQuery(function($) {			
		$("#loading2").css("display","none");			
		$('#txt_9').datepicker({                        
            autoclose: true,             
            format: "dd/mm/yyyy",
            todayHighlight: true,
            language: 'es',
            endDate: '1d'
        }).datepicker();
		if(!ace.vars['touch']) {			
			$('.chosen-select').chosen({allow_single_deselect:true}); 
			//resize the chosen on window resize	
			$(window)
			.off('resize.chosen')
			.on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			});
		}		

		var $validation = true;		
		$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'

		})
		.on('changed.fu.wizard', function(evt, item) {
    		$(".chosen-select").off('resize.chosen').on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);					 
					 $this.next().css({'width': $this.parent().parent().width()});
					 
				})
			}).trigger('resize.chosen')
		})
		.on('actionclicked.fu.wizard' , function(e, info){						
			/*if(info.step == 1 && $validation) {				
				if(!$('#form_general').valid()) {
					e.preventDefault();
					bootbox.dialog({
						message: "Error! Llene todos los campos obligatorios antes de continuar", 
						buttons: {
							"success" : {
								"label" : "Aceptar",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}
			}*/
		})
		.on('finished.fu.wizard', function(e) {
			generarDatos()
			bootbox.dialog({
				message: "La información ha sido enviada!", 
				buttons: {
					"success" : {
						"label" : "Aceptar",
						"className" : "btn-sm btn-primary"
					}
				}
			});
		}).on('stepclick.fu.wizard', function(e){
			//e.preventDefault();//this will prevent clicking and selecting steps						
		});			
		$('#modal-wizard-container').ace_wizard();
		$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');								
		$(document).one('ajaxloadstart.page', function(e) {			
			//in ajax mode, remove remaining elements before leaving page			
			$('[class*=chosen-select]').remove();
		});	

		llenar_identificacion();		
		llenar_empresa();	
		llenar_tipoComprobante();	
		
		
		$("#select_empresa").on("change",function(e){
			$("#txt_7").val($("#select_empresa option:selected").data('pe'));
			$("#txt_8").val($("#select_empresa option:selected").data('e'));
		});
		function llenar_empresa() {			
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_empresa:'llenar_empresa'
				},
				success: function (data) {					
					$('#select_empresa').html(data);
					$("#select_empresa").trigger("chosen:updated");
				}
			});
		}		
		function llenar_identificacion() {			
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_identificacion:'llenar_identificacion'
				},
				success: function (data) {					
					$('#select_identificacion').html(data);
					$("#select_identificacion").trigger("chosen:updated");
				}
			});
		}
		function llenar_tipoComprobante() {			
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_tipoComprobante:'llenar_tipoComprobante'
				},
				success: function (data) {					
					$('#select_comprobante').html(data);
					$("#select_comprobante").trigger("chosen:updated");
				}
			});
		}
		
		
		$("#select_identificacion").on("change",function(){
			if($("#select_identificacion option:selected").data('foo') == '04'){
				//$("#btn_consultar").attr("disabled",false)
				$("#txt_1").attr({
					"maxlength":'13',
					"minlength":"13",})
			}else{
				//$("#btn_consultar").attr("disabled",true)
				if($("#select_identificacion option:selected").data('foo') == '05'){
					$("#txt_1").attr({
					"maxlength":'10',
					"minlength":"10",})	
				}else{
					$("#txt_1").removeAttr("maxlength")
					$("#txt_1").removeAttr("minlength")
				}
			}
			
			$("#txt_1").val("");
			$("#txt_5").val("");
			$("#txt_2").val("");
			$("#txt_3").val("");
			$("#txt_4").val("");			
			$("#txt_6").val("");
			$("#select_identificacion").trigger("chosen:updated");

		}); 
		
		$("#btn_consultar").on("click",function(e){						
			$("#loading2").css("display","block");		
			$.ajax({
		        url: "data/comprobanteRetencion/app.php",
		        type: 'post',
				dataType: 'json',
				data: {
					buscarDatos:'buscarDatos',
					txt_2: $("#txt_1").val(),
					txt_3: $("#select_identificacion option:selected").data('foo')

				},     			       			        
		        success: function (data) {
		        	$("#loading2").css("display","none");	
		        	if(data[0][0] == 2){ ///ruc del sri 1091732935001
		        		$("#txt_2").val(data[0][2]);
		        		if(data[0][9] == "")
		        			$("#txt_3").val(data[0][2]);
		        		else
		        			$("#txt_3").val(data[0][9]);
		        		$("#txt_4").val(data[1][8]);		        		
		        		$("#select_obligacion").val(data[0][21]);		        		
		        		$("#select_obligacion").trigger("chosen:updated");
		        	}
		        	else{
		        		if(data[0] == 1){
		        			bootbox.dialog({
					        	title: "Información",
								message: "El número de RUC ingresado no existe. Ingrese los datos manualmente", 
								buttons: {
									"success" : {
										"label": '<i class="fa fa-check"></i> Aceptar',
										"className": 'btn-primary'
									}
								}
							});		
		        		}else{
		        			if(data[0] == 0){
			        			$("#txt_0").val(data[1]);
			        			$("#txt_2").val(data[6]);
			        			$("#txt_3").val(data[5]);
			        			$("#txt_4").val(data[7]);
			        			$("#txt_5").val(data[8]);			        					        		
			        			$("#txt_6").val(data[4]);				        		
				        		$("#select_obligacion").val(data[9]);	
				        		$("#select_obligacion").trigger("chosen:updated");
				        		$('#btn_3').attr('disabled', false);				
				        		$('#btn_0').attr('disabled', true);				
			        		}
		        		}		        		
		        	}		        	
		        },
		        error: function (xhr, status, errorThrown) {
		        	$("#loading2").css("display","none");		
			        bootbox.dialog({
			        	title: "Información",
						message: "Error! Hubo un problema al generar la información. Llene todos los datos y vuelve a Intentarlo", 
						buttons: {
							"success" : {
								"label": '<i class="fa fa-check"></i> Aceptar',
								"className": 'btn-primary'
							}
						}
					});	
			        console.log("Error: " + errorThrown);
			        console.log("Status: " + status);
			        console.dir(xhr);
		        }
		    });
		});				
	    
	    $("#form_general").validate({	        
	        errorElement: 'span',
			errorClass: 'span',
			focusInvalid: false,
			ignore: "",
	        errorPlacement: function(error, element) {
	            error.appendTo("span#errors");
	        }, 
	        rules: {
	            txt_1: {
					required: true				
				},												
				txt_2: {
					required: true				
				},
				txt_3: {
					required: true				
				},
				txt_4: {
					required: true				
				},
				txt_5: {
					required: true				
				},
				txt_6: {
					required: true				
				},
				txt_7: {
					required: true				
				},
				txt_8: {
					required: true				
				},
				txt_9: {
					required: true				
				},
				txt_10: {
					required: true				
				},
				select_empresa: {
					required: true				
				},
				select_obligacion: {
					required: true				
				},
				select_identificacion: {
					required: true				
				},
				select_comprobante: {
					required: true				
				},
				select_ejercicio: {
					required: true				
				},	           
	        },	
	          
	       /* highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
	
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},*/
	    });		
	});		
});