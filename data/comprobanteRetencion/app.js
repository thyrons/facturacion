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
		llenar_codigoRetencion();				
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
		function llenar_codigoRetencion() {			
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_codigoRetencion:'llenar_codigoRetencion'
				},
				success: function (data) {					
					$('#select_codigoRetencion').html(data);
					$("#select_codigoRetencion").trigger("chosen:updated");
				}
			});
		}		
		$("#select_codigoRetencion").on("change",function(){			
			$('#select_Retencion').html("");
			$('#select_Retencion').html('<option value=""> </option>');
			$("#select_Retencion").trigger("chosen:updated");
			$("#txt_11").val("");
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_Retencion:'llenar_Retencion',
					id : $("#select_codigoRetencion").val(),
				},
				success: function (data) {					
					$('#select_Retencion').html(data);
					$("#select_Retencion").trigger("chosen:updated");
					$("#txt_11").val("");
					$("#txt_12").val("");
				}
			});		
		});
		$("#select_Retencion").on("change",function(){		
			$("#txt_11").val($("#select_Retencion option:selected").data('foo'));
		});
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
				select_mes: {
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
	    $("#btn_agregar").on('click',function(){
			var temp = 0;
			if($("#select_Retencion").val() != '' && $("#select_codigoRetencion").val() != '' && $("#txt_11").val() != '' && $("#txt_12").val() != ''){
				if(fn_cantidad() == 0){
					temp = 0;
				}else{
					if(fn_recorrer() > 0){
						temp = 1;
						bootbox.dialog({
							message: "Error! Este Impuesto y código ya existen. Ingrese Nuevamente", 
							buttons: {
								"success" : {
									"label" : "Aceptar",
									"className" : "btn-sm btn-primary"
								}
							}
						});
					}else{
						temp = 0;
					}
				}
				if(temp == 0){
					var retenido = 0;
					retenido = (parseFloat($("#txt_12").val()) * parseFloat($("#txt_11").val())) / 100;
					retenido = Math.round(retenido * 100) /100;
					var cod = "";
					$("#tabla_comprobante tbody").append("<tr>" + 
						"<td style='display:none;' >" + $("#select_comprobante option:selected").val() + "</td>" + 						
	                    "<td align=center >" + $("#select_mes option:selected").text() + '/' +$("#select_ejercicio option:selected").text() + "</td>" +
						"<td style='display:none;' >" + $("#select_Retencion").val() + "</td>" +
	                    "<td align=center >" + $("#select_Retencion option:selected").text().substr(0,50) + "</td>" +
	                    "<td align=center >" + $("#txt_12").val() + "</td>" +                    
	                    "<td style='display:none;' >" + $("#select_codigoRetencion").val() + "</td>" +
	                    "<td align=center >" + $("#select_codigoRetencion option:selected").text() + "</td>" +
	                    "<td align=center >" + $("#txt_11").val() + "</td>" +
	                    "<td align=center >" + retenido + "</td>" +
	                    "<td align=center >" + "<a class='elimina'><img src='dist/images/delete.png' /></a>" + "</td>" + 
					"</tr>");
					$("#select_codigoRetencion").val("");
					$("#select_codigoRetencion").trigger("chosen:updated");	                
					$("#select_Retencion").val("");
					$("#select_Retencion").trigger("chosen:updated");	                
	                $("#txt_11").val("");
	                $("#txt_12").val("");
	                fn_dar_eliminar();
	                $("#tabla_comprobante tfoot").html("<tr>" + 
						"<td colspan='5' align='right' >Total de la Reteneción $</td>" +
						"<td align='center'>"+fn_calcular()+"</td>" +
					"</tr>");	                

            	}
			}else{
				bootbox.dialog({
					message: "Error! LLene todos los datos antes de continuar", 
					buttons: {
						"success" : {
							"label" : "Aceptar",
							"className" : "btn-sm btn-primary"
						}
					}
				});
			}
		});
		function fn_dar_eliminar(){
	    	$("a.elimina").click(function(){
	    		id = $(this).parents("tr").find("td").eq(0).html();                                
                $(this).parents("tr").fadeOut("normal", function(){
                    $(this).remove();                                                
                    $("#tabla_comprobante tfoot").html("<tr>" + 
						"<td colspan='5' align='right' >Total de la Reteneción $</td>" +
						"<td align='center'>"+fn_calcular()+"</td>" +
					"</tr>");
                });                   
	    	});	      	    	           
	    };		
		function fn_cantidad(){
			cantidad = $("#tabla_comprobante tbody").find("tr").length;
			return cantidad;			
		};
		function fn_recorrer(){
			var temp = 0;
			$("#tabla_comprobante tbody tr").each(function (index) {
            	var campo1, campo2, campo3;
            	$(this).children("td").each(function (index2){            		
	                switch (index2){
	                    case 3: 
	                    	campo1 = $(this).text();
	                    	break;
	                    case 5: 
	                    	campo2 = $(this).text();
							break;	                    
						case 7: 
	                    	campo3 = $(this).text();
							break;	                    
	                } 	               
            	});
            	if(campo2 == $("#select_codigoRetencion").val() && campo1 == $("#select_Retencion option:selected").text() && campo3 == $("#txt_11").val()){
                	temp++;
                }            	            	
        	});
        	return temp;
        }
        function fn_calcular(){        	
			var temp = 0;
			$("#tabla_comprobante tbody tr").each(function (index) {
            	var campo1
            	$(this).children("td").each(function (index2){            		
	                switch (index2){
	                    case 8: 
	                    	campo1 = $(this).text();
	                    	break;	                    
	                } 	               
            	});
            	temp = temp + parseFloat(campo1);
            	temp = Math.round(temp * 100) /100;
        	});
        	return temp;
        }

        function generarDatos(){
        	var formulario = $("#form_general").serialize();        	
        	var cont = 0;
		    var vect0 = new Array();
		    var vect1 = new Array();
		    var vect2 = new Array();
		    var vect3 = new Array();
		    var vect4 = new Array();
		    var vect5 = new Array();
		    var vect6 = new Array();
		    var vect7 = new Array();
		    var vect8 = new Array();		    
		    var string_v0 = "";
		    var string_v1 = "";
			var string_v2 = "";
			var string_v3 = "";
			var string_v4 = "";
			var string_v5 = "";
			var string_v6 = ""; 
			var string_v7 = "";
			var string_v8 = "";			
		    $("#tabla_comprobante tbody tr").each(function(index2) {
		        $(this).children("td").each(function(index2) {
		            switch (index2) {
		                case 0:
		                    vect0[cont] = $(this).text();
		                    break;
		                case 1:
		                    vect1[cont] = $(this).text();
		                    break;
		                case 2:
		                    vect2[cont] = $(this).text();
		                    break;
		                case 3:
		                    vect3[cont] = $(this).text();
		                    break;
		                case 4:
		                    vect4[cont] = $(this).text();
		                    break;
		                case 5:
		                    vect5[cont] = $(this).text();
		                    break;
		                case 6:
		                    vect6[cont] = $(this).text();
		                    break;
		                case 7:
		                    vect7[cont] = $(this).text();
		                    break;
		                case 8:
		                    vect8[cont] = $(this).text();
		                    break;		                              
		            }
		        });
		        cont++;
		    }); 
		    for (i = 0; i < vect1.length; i++) {
	            string_v0 = string_v0 + "|" + vect0[i];
	            string_v1 = string_v1 + "|" + vect1[i]; 
	            string_v2 = string_v2 + "|" + vect2[i];
	            string_v3 = string_v3 + "|" + vect3[i];
	            string_v4 = string_v4 + "|" + vect4[i];
	            string_v5 = string_v5 + "|" + vect5[i];
	            string_v6 = string_v6 + "|" + vect6[i];
	            string_v7 = string_v7 + "|" + vect7[i];
	            string_v8 = string_v8 + "|" + vect8[i];	            
        	}	
        	$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: formulario + "&enviarDatos=" + 'enviarDatos' + "&s1=" + string_v1 + "&s2=" + string_v2 + "&s3=" + string_v3+ "&s4=" + string_v4+ "&s5=" + string_v5+ "&s6=" + string_v6+ "&s7=" + string_v7+ "&s8=" + string_v8+ "&s0=" + string_v0 ,								
				success: function (data) {					
					
				}
			});
        }
	});		
});