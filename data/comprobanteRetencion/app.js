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
		$('#txt_4').datepicker({                        
            autoclose: true,             
            format: "dd/mm/yyyy",
            todayHighlight: true,
            language: 'es',
            endDate: '1d'
        }).datepicker();

		llenar_identificacion();
		llenar_tipoComprobante();
		llenar_codigoRetencion();
		
		function llenar_identificacion() {			
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_identificacion:'llenar_identificacion'
				},
				success: function (data) {					
					$('#select_identificacion').html(data);
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
				}
			});
		}
		
		

		$("#select_identificacion").on("change",function(){
			if($(this).val() == '1'){
				//$("#btn_consultar").attr("disabled",false)
				$("#txt_2").attr({
					"maxlength":'13',
					"minlength":"13",})
			}else{
				//$("#btn_consultar").attr("disabled",true)
				if($(this).val() == '2'){
					$("#txt_2").attr({
					"maxlength":'10',
					"minlength":"10",})	
				}else{
					$("#txt_2").removeAttr("maxlength")
					$("#txt_2").removeAttr("minlength")
				}
			}
			if($(this).val() == '1'){
				//$("#btn_consultar").attr("disabled",false)
			}else{
				//$("#btn_consultar").attr("disabled",true)
			}
			$("#txt_2").val("");
			$("#txt_3").val("");
			$("#txt_6").val("");
			$("#txt_7").val("");
			$("#txt_8").val("");
			$("#select_obligacion").select2('val', "0").trigger("change");

		});
		$("#select_codigoRetencion").on("change",function(){			
			$('#select_Retencion').html("");
			$('#select_Retencion').html('<option value="">&nbsp;</option>');
			$("#select_Retencion").select2('val', "").trigger("change");
			$("#txt_10").val("");
			$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: {
					llenar_Retencion:'llenar_Retencion',
					id : $("#select_codigoRetencion").val(),
				},
				success: function (daFta) {					
					$('#select_Retencion').html(data);
					$("#txt_10").val("");
					$("#txt_11").val("");
				}
			});		
		});
		$("#select_Retencion").on("change",function(){		
			$("#txt_10").val($("#select_Retencion option:selected").data('foo'));
		});

		$("#btn_consultar").on("click",function(e){						
			$("#loading2").css("display","block");		
			$.ajax({
		        url: "data/comprobanteRetencion/app.php",
		        type: 'post',
				dataType: 'json',
				data: {
					buscarDatos:'buscarDatos',
					txt_2: $("#txt_2").val(),
					txt_3: $("#select_identificacion").val()

				},     			       			        
		        success: function (data) {
		        	$("#loading2").css("display","none");	
		        	if(data[0][0] == 1){ ///ruc del sri 1091732935001
		        		$("#txt_6").val(data[0][2]);
		        		if(data[0][9] != '')
		        			$("#txt_7").val(data[0][9]);	
		        		else
		        			$("#txt_7").val(data[0][2]);				        		
		        		
		        		$("#txt_8").val(data[1][8]);		        						        		
		        		$("#select_obligacion").select2('val', data[0][21]).trigger("change");
		        	}else{
		        		if(data[0] == 0){ ///datos de la base

		        		}
		        	}

		        	/*bootbox.dialog({
						message: "Error! Este número de RUC no exite. Ingrese los datos Manualmente", 
						buttons: {
							"success" : {
								"label" : "Aceptar",
								"className" : "btn-sm btn-primary"
							}
						}
					});*/
		        },
		        error: function (xhr, status, errorThrown) {
		        	$("#loading2").css("display","none");		
			        bootbox.dialog({
						message: "Error! Hubo un problema al generar la información. Vuelve a Intentarlo", 
						buttons: {
							"success" : {
								"label" : "Aceptar",
								"className" : "btn-sm btn-primary"
							}
						}
					});	
			        console.log("Error: " + errorThrown);
			        console.log("Status: " + status);
			        console.dir(xhr);
		        }
		    });
		})

		$('[data-rel=tooltip]').tooltip();			
		$(".select2").css('width','100%').select2({
			allow_single_deselect: true,
			allowClear: true ,			
		    no_results_text: "No se encontraron resultados",
		})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 						
		var $validation = true;
		$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'
		})
		.on('actionclicked.fu.wizard' , function(e, info){
			if(info.step == 1 && $validation) {
				if(!$('#form_informacionGeneral').valid()) {
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
			}
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
			$('[class*=select2]').remove();
		});	

		$.mask.definitions['~']='[+-]';
		$('#txt_3').mask('999-999-999');
	
		jQuery.validator.addMethod("phone", function (value, element) {
			return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{3}( x\d{1,6})?$/.test(value);
		}, "Ingrese un número de télefono válido.");
	
		$('#form_informacionGeneral').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				txt_2: {
					required: true,					
				},								
				txt_3: {
					required: true,
					phone: 'required'
				},				
				txt_4: {
					required: true,
				},
				txt_5: {
					required: true,
				},				
				txt_6: {
					required: true,
				},
				txt_7: {
					required: true,
				},
				txt_8: {
					required: true,
				},
				select_identificacion:{
					required: true,	
				},
				select_obligacion:{
					required: true,	
				},
				select_comprobante:{
					required: true,	
				},
				select_ejercicio:{
					required: true,	
				},
				txt_9: {
					required: true,
				},
				txt_12: {
					required: false,
				},
			},
	
			messages: {				
				txt_2: "Ingrese un valor",
				txt_3: "Ingrese un número válido",
				txt_4: "Seleccione una fecha",
				txt_6: "Ingrese una razón social",
				txt_7: "Ingrese un nombre comercial",
				txt_8: "Ingrese una dirección",
				txt_9: "Ingrese un número de documento válido",				
				select_identificacion: "Seleccione un tipo de Identificación",
				select_obligacion: "Seleccion un tipo de Obligación",
				select_comprobante: "Seleccion un tipo de Documento",
				select_ejercicio: "Seleccion un año",
			},
	
	
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
	
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},
	
			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},
	
			submitHandler: function (form) {
			},
			invalidHandler: function (form) {
			}
		});
		
		$("#btn_agregar").on('click',function(){
			var temp = 0;
			if($("#select_Retencion").val() != '' && $("#select_codigoRetencion").val() != '' && $("#txt_10").val() != '' && $("#txt_11").val() != ''){
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
					retenido = (parseFloat($("#txt_11").val()) * parseFloat($("#txt_10").val())) / 100;
					retenido = Math.round(retenido * 100) /100;
					$("#tabla_comprobante tbody").append("<tr>" + 
						"<td style='display:none;' >" + $("#select_comprobante option:selected").val() + "</td>" + 
						"<td align=center >" + $("#select_comprobante option:selected").text() + "</td>" +
						"<td align=center >" + $("#txt_9").val() + "</td>" +
	                    "<td align=center >" + $("#txt_4").val() + "</td>" +
	                    "<td align=center >" + $("#select_ejercicio option:selected").text() + "</td>" +
						"<td style='display:none;' >" + $("#select_Retencion").val() + "</td>" +
	                    "<td align=center >" + $("#select_Retencion option:selected").text() + "</td>" +
	                    "<td align=center >" + $("#txt_11").val() + "</td>" +                    
	                    "<td style='display:none;' >" + $("#select_codigoRetencion").val() + "</td>" +
	                    "<td align=center >" + $("#select_codigoRetencion option:selected").text() + "</td>" +
	                    "<td align=center >" + $("#txt_10").val() + "</td>" +
	                    "<td align=center >" + retenido + "</td>" +
	                    "<td align=center >" + "<a class='elimina'><img src='dist/images/delete.png' /></a>" + "</td>" + 
					"</tr>");
	                $("#select_codigoRetencion").select2('val', "").trigger("change");
	                $("#txt_11").val("");
	                fn_dar_eliminar();
	                $("#tabla_comprobante tfoot").html("<tr>" + 
						"<td colspan='8' align='right' >Total de la Reteneción $</td>" +
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
						"<td colspan='8' align='right' >Total de la Reteneción $</td>" +
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
	                    case 6: 
	                    	campo1 = $(this).text();
	                    	break;
	                    case 8: 
	                    	campo2 = $(this).text();
							break;	                    
						case 10: 
	                    	campo3 = $(this).text();
							break;	                    
	                } 	               
            	});
            	if(campo2 == $("#select_codigoRetencion").val() && campo1 == $("#select_Retencion option:selected").text() && campo3 == $("#txt_10").val()){
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
	                    case 11: 
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
        	var formulario = $("#form_informacionGeneral").serialize();        	
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
		    var vect9 = new Array();
		    var vect10 = new Array();
		    var vect11 = new Array();		    
		    var string_v0 = "";
		    var string_v1 = "";
			var string_v2 = "";
			var string_v3 = "";
			var string_v4 = "";
			var string_v5 = "";
			var string_v6 = ""; 
			var string_v7 = "";
			var string_v8 = "";
			var string_v9 = ""; 
			var string_v10 = "";
			var string_v11 = "";			
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
		                case 9:
		                    vect9[cont] = $(this).text();
		                    break;
		                case 10:
		                    vect10[cont] = $(this).text();
		                    break;
		                case 11:
		                    vect11[cont] = $(this).text();
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
	            string_v9 = string_v9 + "|" + vect9[i];
	            string_v10 = string_v10 + "|" + vect10[i];
	            string_v11 = string_v11 + "|" + vect11[i];	            
        	}	
        	$.ajax({
				url: 'data/comprobanteRetencion/app.php',
				type: 'post',
				data: formulario + "&enviarDatos=" + 'enviarDatos' + "&s1=" + string_v1 + "&s2=" + string_v2 + "&s3=" + string_v3+ "&s4=" + string_v4+ "&s5=" + string_v5+ "&s6=" + string_v6+ "&s7=" + string_v7+ "&s8=" + string_v8+ "&s9=" + string_v9+ "&s10=" + string_v10 + "&s11=" + string_v11 + "&s0=" + string_v0 ,								
				success: function (data) {					
					$('#select_nivel').html(data);
				}
			});

        }
	});		
});