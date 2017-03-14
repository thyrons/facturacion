angular.module('scotchApp').controller('empresaController', function ($scope, $route) {
	
	$scope.$route = $route;
	

	jQuery(function($) {		

		

		$('[data-toggle="tooltip"]').tooltip(); 			
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

		//validacion formulario empresas
		$('#form_empresa').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
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
				txt_4:{
					required : true,
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
				select_emision: {
					required: true				
				},
				select_establecimiento: {
					required: true				
				},				
			},
			messages: {				
				txt_1: { 	
					required: "Campo Obligatorio",			
				},
				txt_2: { 	
					required: "Campo Obligatorio",			
				},				
				txt_4: {
					required: "Campo Obligatorio",
				},				
				
				txt_3: {
					required: "Campo Obligatorio",
				},
				txt_5: {
					required: "Campo Obligatorio",					
				},
				txt_6: {
					required: "Campo Obligatorio",					
				},
				txt_7: {
					required: "Campo Obligatorio",					
				},
				txt_8: {
					required: "Campo Obligatorio",					
				},
				select_emision: {
					required: "Campo Obligatorio",
				},
				select_establecimiento: {
					required: "Campo Obligatorio",
				},
			},
			//para prender y apagar los errores
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},
			submitHandler: function (form) {
				
			}
		});
		// Fin 

		// validacion punto
		function ValidPun(e){
		    var key;
		    if (window.event) {
		        key = e.keyCode;
		    }
		    else if (e.which) {
		        key = e.which;
		    }

		    if (key < 48 || key > 57) {
		        if (key === 46 || key === 8)     {
		            return true;
		        } else {
		            return false;
		        }
		    }
		    return true;   
		} 
		// fin 

		// validacion solo numeros
		function ValidNum() {
		    if (event.keyCode < 48 || event.keyCode > 57) {
		        event.returnValue = false;
		    }
		    return true;
		}
		// fin

		// recargar formulario
		function redireccionar() {
			setTimeout(function() {
			    location.reload(true);
			}, 1000);
		}
		// fin				
		$('#btn_3').attr('disabled', true);				
		$('#btn_0').click(function() {
			var respuesta = $('#form_empresa').valid();			
			if (respuesta == true) {
				//$('#btn_0').attr('disabled', true);
				var submit = "btn_gardar";
				var formulario = $("#form_empresa").serialize();
				$("#loading").css("display","block");
				$.ajax({
			        url: "data/empresa/app.php",
			        data: formulario + "&btn_guardar=" + submit,
			        type: "POST",
			        async: true,
			        success: function (data) {
			        	$("#loading").css("display","none");
			        	var val = data;
			        	if(data == '1') {
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Registro Agregado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});
							redireccionar();
				    	}  				    	
				    	
				    	if(data == '3') {
				    		$("#nombre_usuario").val("");
				    		$("#nombre_usuario").focus();
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Error.. el nombre de Empresa ya esta registrado <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});							
				    	}   
				    	if(data == '4') {				    		
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Error.. Intente nuevamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});		
							redireccionar();					
				    	}                
			        },
			        error: function (xhr, status, errorThrown) {
			        	$("#loading").css("display","none");
				        alert("Hubo un problema!");
				        console.log("Error: " + errorThrown);
				        console.log("Status: " + status);
				        console.dir(xhr);
			        }
			    });
			}		 
		});				
		$('#btn_1').click(function() {
			location.reload(true);
		});		
		$('#btn_2').click(function() {
			$('#myModal').modal('show');
		});		
		$('#btn_3').click(function() {
			var respuesta = $('#form_empresa').valid();

			if (respuesta == true) {
				//$('#btn_3').attr('disabled', true);
				var submit = "btn_modificar";
				var formulario = $("#form_empresa").serialize();
				$("#loading").css("display","block");
				$.ajax({
			        url: "data/empresa/app.php",
			        data: formulario + "&btn_modificar=" + submit,
			        type: "POST",
			        async: true,
			        success: function (data) {
			        	$("#loading").css("display","none");
			        	var val = data;
			        	if(data == '1') {
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Registro Agregado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});
							redireccionar();
				    	}   				    	
				    	if(data == '3') {
				    		$("#nombre_usuario").val("");
				    		$("#nombre_usuario").focus();
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Error.. el nombre de empresa ya esta registrado <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});							
				    	}   
				    	if(data == '4') {				    		
			        		$.gritter.add({
								title: 'Mensaje',
								text: 'Error.. Intente nuevamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
								time: 1000				
							});		
							redireccionar();					
				    	}                       
			        },
			        error: function (xhr, status, errorThrown) {
			        	$("#loading").css("display","none");
				        alert("Hubo un problema!");
				        console.log("Error: " + errorThrown);
				        console.log("Status: " + status);
				        console.dir(xhr);
			        }
			    });
			}
		});
		
		/*jqgrid*/    
		jQuery(function($) {
		    var grid_selector = "#table";
		    var pager_selector = "#pager";
		    
		    //cambiar el tamaño para ajustarse al tamaño de la página
		    $(window).on('resize.jqGrid', function () {
		        //$(grid_selector).jqGrid( 'setGridWidth', $("#myModal").width());	        
		        $(grid_selector).jqGrid( 'setGridWidth', $("#myModal .modal-dialog").width()-30);
		    });
		    //cambiar el tamaño de la barra lateral collapse/expand
		    var parent_column = $(grid_selector).closest('[class*="col-"]');
		    $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
		        if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
		            //para dar tiempo a los cambios de DOM y luego volver a dibujar!!!
		            setTimeout(function() {
		                $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
		            }, 0);
		        }
		    });

		    // buscador clientes
		    jQuery(grid_selector).jqGrid({	        
		        datatype: "xml",
		        url: 'data/empresa/xml_empresa.php',        
		        colNames: ['ID','RAZON SOCIAL','NOMBRE COMERCIAL','DIRECCION','TELEFONO','RUC','PUNTO EMISION','ESTABLECIMIENTO', 'EMAIL', 'AUTORIZACION', 'CIUDAD'],
		        colModel:[      
		            {name:'id',index:'id', frozen:true, align:'left', search:false, hidden: true},
		            {name:'razonSocial',index:'razonSocial',frozen : true, hidden: false, align:'left',search:true,width: ''},
		            {name:'nombreComercial',index:'nombreComercial',frozen : true, hidden: true, align:'left',search:true,width: ''},		            
		            {name:'direccion',index:'direccion',frozen : true, hidden: true, align:'left',search:false,width: ''},
		            {name:'telefono',index:'telefono',frozen : true, hidden: true, align:'left',search:false,width: ''},		            
		            {name:'ruc',index:'ruc',frozen : true, hidden: false, align:'left',search:false,width: ''},
		            {name:'puntoEmision',index:'puntoEmision',frozen : true, hidden: false, align:'left',search:false,width: ''},		            
		            {name:'establecimiento',index:'establecimiento',frozen : true, hidden: false, align:'left',search:false,width: ''},
		            {name:'email',index:'email',frozen : true, hidden: true, align:'left',search:false,width: ''},
		            {name:'autorizacion',index:'autorizacion',frozen : true, hidden: true, align:'left',search:false,width: ''},
		            {name:'ciudad',index:'ciudad',frozen : true, hidden: false, align:'left',search:false,width: ''},
		        ],          
		        rowNum: 10,       
		        width:600,
		        shrinkToFit: true,
		        height:200,
		        rowList: [10,20,30],
		        pager: pager_selector,        
		        sortname: 'id',
		        sortorder: 'asc',
		        altRows: true,
		        multiselect: false,
		        multiboxonly: true,
		        viewrecords : true,
		        loadComplete : function() {
		            var table = this;
		            setTimeout(function(){
		                styleCheckbox(table);
		                updateActionIcons(table);
		                updatePagerIcons(table);
		                enableTooltips(table);
		            }, 0);
		        },
		        ondblClickRow: function(rowid) {     	            	            
		            var gsr = jQuery(grid_selector).jqGrid('getGridParam','selrow');                                              
	            	var ret = jQuery(grid_selector).jqGrid('getRowData',gsr);

	            	$('#txt_0').val(ret.id);	            	
	            	$('#txt_1').val(ret.nombreComercial);
	            	$('#txt_2').val(ret.razonSocial);
	            	$('#txt_3').val(ret.direccion);
	            	$('#txt_4').val(ret.telefono);	            	
	            	$('#txt_5').val(ret.ruc);	            	
	            	$("#select_emision").val(ret.puntoEmision);
	            	$("#select_emision").trigger("chosen:updated");
	            	$("#select_establecimiento").val(ret.establecimiento);
	            	$("#select_establecimiento").trigger("chosen:updated");
	            	$('#txt_6').val(ret.autorizacion);
	            	$('#txt_8').val(ret.ciudad);
	            	$('#txt_7').val(ret.email);
	            	
	
		            $('#clave').attr('disabled',true);
		            $('#clave2').attr('disabled',true);
		            $('#myModal').modal('hide'); 
		            $('#btn_0').attr('disabled', true); 
		            $('#btn_3').attr('disabled', false); 	            
		        },		        
		        caption: "LISTA EMPRESAS"
		    });
	
		    $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto		    
		    function aceSwitch( cellvalue, options, cell ) {
		        setTimeout(function(){
		            $(cell) .find('input[type=checkbox]')
		            .addClass('ace ace-switch ace-switch-5')
		            .after('<span class="lbl"></span>');
		        }, 0);
		    }	    	   

		    jQuery(grid_selector).jqGrid('navGrid',pager_selector,
		    {   
		        edit: false,
		        editicon : 'ace-icon fa fa-pencil blue',
		        add: false,
		        addicon : 'ace-icon fa fa-plus-circle purple',
		        del: false,
		        delicon : 'ace-icon fa fa-trash-o red',
		        search: true,
		        searchicon : 'ace-icon fa fa-search orange',
		        refresh: true,
		        refreshicon : 'ace-icon fa fa-refresh green',
		        view: true,
		        viewicon : 'ace-icon fa fa-search-plus grey'
		    },
		    {	        
		        recreateForm: true,
		        beforeShowForm : function(e) {
		            var form = $(e[0]);
		            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
		            style_edit_form(form);
		        }
		    },
		    {
		        closeAfterAdd: true,
		        recreateForm: true,
		        viewPagerButtons: false,
		        beforeShowForm : function(e) {
		            var form = $(e[0]);
		            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
		            .wrapInner('<div class="widget-header" />')
		            style_edit_form(form);
		        }
		    },
		    {
		        recreateForm: true,		        
		        beforeShowForm : function(e) {
		            var form = $(e[0]);
		            if(form.data('styled')) return false;      
		            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
		            style_delete_form(form); 
		            form.data('styled', true);
		        },
		        onClick : function(e) {}
		    },
		    {		    	
		        //search form
				recreateForm: true,
				afterShowSearch: function(e){
					var form = $(e[0]);
					form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
					style_search_form(form);
				},
				afterRedraw: function(){
					style_search_filters($(this));
				}
				,
				multipleSearch: false,
				overlay: false,				
		        sopt: ['eq', 'cn'],
	            defaultSearch: 'eq',            	       
		    },
		    {
		        //view record form
		        overlay: false,
		        recreateForm: true,
		        beforeShowForm: function(e){
		            var form = $(e[0]);
		            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
		        }
		    })	    
		    function style_edit_form(form) {
				//enable datepicker on "sdate" field and switches for "stock" field
				form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
				
				form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
						   //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
						  //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
		
						
				//update buttons classes
				var buttons = form.next().find('.EditButton .fm-button');
				buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
				buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
				buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
				
				buttons = form.next().find('.navButton a');
				buttons.find('.ui-icon').hide();
				buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
				buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');		
			}
		
			function style_delete_form(form) {
				var buttons = form.next().find('.EditButton .fm-button');
				buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
				buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
				buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
			}
			
			function style_search_filters(form) {
				form.find('.delete-rule').val('X');
				form.find('.add-rule').addClass('btn btn-xs btn-primary');
				form.find('.add-group').addClass('btn btn-xs btn-success');
				form.find('.delete-group').addClass('btn btn-xs btn-danger');
			}
			function style_search_form(form) {
				var dialog = form.closest('.ui-jqdialog');
				var buttons = dialog.find('.EditTable')
				buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
				buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
				buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
			}
			
			function beforeDeleteCallback(e) {
				var form = $(e[0]);
				if(form.data('styled')) return false;
				
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_delete_form(form);
				
				form.data('styled', true);
			}
			
			function beforeEditCallback(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_edit_form(form);
			}
		
		
		
			//it causes some flicker when reloading or navigating grid
			//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
			//or go back to default browser checkbox styles for the grid
			function styleCheckbox(table) {
			/**
				$(table).find('input:checkbox').addClass('ace')
				.wrap('<label />')
				.after('<span class="lbl align-top" />')
		
		
				$('.ui-jqgrid-labels th[id*="_cb"]:first-child')
				.find('input.cbox[type=checkbox]').addClass('ace')
				.wrap('<label />').after('<span class="lbl align-top" />');
			*/
			}
			
		
			//unlike navButtons icons, action icons in rows seem to be hard-coded
			//you can change them like this in here if you want
			function updateActionIcons(table) {
				/**
				var replacement = 
				{
					'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
					'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
					'ui-icon-disk' : 'ace-icon fa fa-check green',
					'ui-icon-cancel' : 'ace-icon fa fa-times red'
				};
				$(table).find('.ui-pg-div span.ui-icon').each(function(){
					var icon = $(this);
					var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
					if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
				})
				*/
			}
			
			//replace icons with FontAwesome icons like above
			function updatePagerIcons(table) {
				var replacement = 
				{
					'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
					'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
					'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
					'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
				};
				$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
					var icon = $(this);
					var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
					
					if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
				})
			}
		
			function enableTooltips(table) {
				$('.navtable .ui-pg-button').tooltip({container:'body'});
				$(table).find('.ui-pg-div').tooltip({container:'body'});
			}
		
			//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
		
			$(document).one('ajaxloadstart.page', function(e) {
				$.jgrid.gridDestroy(grid_selector);
				$('.ui-jqdialog').remove();
			});
		});
		// fin
	});
});