<!DOCTYPE html>
<html ng-app="scotchApp" lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Facturación Electrónica</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="dist/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="dist/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="dist/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="dist/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="dist/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="dist/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="dist/css/chosen.min.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="dist/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="dist/css/ace-skins.min.css" />
		<link rel="stylesheet" href="dist/css/ace-rtl.min.css" />				
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="dist/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="dist/js/ace-extra.min.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="dist/js/html5shiv.min.js"></script>
		<script src="dist/js/respond.min.js"></script>
		<![endif]-->		

		<!-- Angular js -->
		<script src="dist/angular-1.5.0/angular.js"></script>
		<script src="dist/angular-1.5.0/angular-route.js"></script>
		<script src="dist/angular-1.5.0/angular-animate.js"></script>
		<script src="dist/angular-1.5.0/ui-bootstrap-tpls-1.1.2.min.js"></script>		

		<!-- controlador procesos angular -->
  		<script src="data/app.js"></script>
  		<script src="data/home/app.js"></script>  		
  		<script src="data/usuarios/app.js"></script>  	
  		<script src="data/niveles/app.js"></script>  	
  		<script src="data/tipoEmision/app.js"></script>
  		<script src="data/tipoComprobante/app.js"></script>
  		<script src="data/tipoAmbiente/app.js"></script>
  		<script src="data/tipoIdentificacion/app.js"></script>
  		<script src="data/tipoImpuesto/app.js"></script>
  		<script src="data/tarifaImpuesto/app.js"></script>
  		<script src="data/tipoRetencion/app.js"></script>
  		<script src="data/tarifaRetencion/app.js"></script>
  		<script src="data/comprobanteRetencion/app.js"></script>  	
  		<script src="data/empresa/app.js"></script>
  		<script src="data/contribuyentes/app.js"></script>

	</head>

	<body ng-controller="mainController" class="skin-3 no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Facturación AI
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="dist/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									Jason
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configuraciones
									</a>
								</li>
								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" >
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">					
					<li ng-class="{active: $route.current.activetab == 'inicio'}">
						<a href="#/">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li ng-class = "{'active open': $route.current.activetab == 'usuarios' || $route.current.activetab == 'niveles' || $route.current.activetab == 'empresa' || $route.current.activetab == 'contribuyentes'}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							Configuraciones
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li ng-class="{active: $route.current.activetab == 'usuarios'}">
								<a href="#/usuarios" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Nuevo Usuario
								</a>
								<b class="arrow"></b>
							</li>							
							<li ng-class="{active: $route.current.activetab == 'niveles'}">
								<a href="#/niveles" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Nivel de Acceso
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'empresa'}">
								<a href="#/empresa" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Empresa
								</a>
								<b class="arrow"></b>
							</li>	
							<li ng-class="{active: $route.current.activetab == 'contribuyentes'}">
								<a href="#/contribuyentes" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Contributyentes
								</a>
								<b class="arrow"></b>
							</li>							
						</ul>
					</li>
					<li ng-class = "{'active open': $route.current.activetab == 'tipoAmbiente' || $route.current.activetab == 'tipoEmision' || $route.current.activetab == 'tipoComprobante' || $route.current.activetab == 'tipoIdentificacion' || $route.current.activetab == 'tipoImpuesto' || $route.current.activetab == 'tipoRetencion' || $route.current.activetab == 'tarifaImpuesto' || $route.current.activetab == 'tarifaRetencion' }">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							Parámetros
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li ng-class="{active: $route.current.activetab == 'tipoAmbiente'}">
								<a href="#/tipoAmbiente" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Ambiente
								</a>
								<b class="arrow"></b>
							</li>							
							<li ng-class="{active: $route.current.activetab == 'tipoEmision'}">
								<a href="#/tipoEmision" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Emisión
								</a>
								<b class="arrow"></b>
							</li>							
							<li ng-class="{active: $route.current.activetab == 'tipoComprobante'}">
								<a href="#/tipoComprobante" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Comprobante
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'tipoIdentificacion'}">
								<a href="#/tipoIdentificacion" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Identificación
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'tipoImpuesto'}">
								<a href="#/tipoImpuesto" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Impuesto
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'tipoRetencion'}">
								<a href="#/tipoRetencion" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tipo Retención
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'tarifaImpuesto'}">
								<a href="#/tarifaImpuesto" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tarifa Impuesto
								</a>
								<b class="arrow"></b>
							</li>
							<li ng-class="{active: $route.current.activetab == 'tarifaRetencion'}">
								<a href="#/tarifaRetencion" target="">
									<i class="menu-icon fa fa-caret-right"></i>
									Tarifa Retención
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content ng-view" id="main-container">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Inicio</a>
							</li>
							<li class="active">Generales</li>
						</ul><!-- /.breadcrumb -->						
					</div>

					<div class="page-content">						
						<div class="page-header">
							<h1>
								Inicio
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Configuraciones
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Facturación</span>
							Application &copy; 2017
						</span>						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="dist/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="dist/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="dist/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="dist/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="dist/js/jquery-ui.custom.min.js"></script>
		<script src="dist/js/jquery.ui.touch-punch.min.js"></script>						
		<!-- ace scripts -->
		<script src="dist/js/ace-elements.min.js"></script>
		<script src="dist/js/ace.min.js"></script>
		<script src="dist/js/jquery.gritter.min.js"></script>
		<script src="dist/js/jquery.validate.min.js"></script>
		<script src="dist/js/bootstrap-datepicker.min.js"></script>
		<script src="dist/js/jquery.jqGrid.min.js"></script>

		<script src="dist/js/grid.locale-en.js"></script>
		<script src="dist/js/chosen.jquery.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});				
				$( "#navbar a" ).click(function( event ) {
					event.preventDefault();  
				});
			
			})
		</script>
		<style type="text/css">
	  		#cuadro_estadistico .tickLabel{
	     		max-width: 60px !important;
	  		}		
	  		.panel-body:not(.six-col) { padding:0px }
			.glyphicon { margin-right:3px; }
			.glyphicon-new-window { margin-left:3px; }
			.panel-body .radio,.panel-body .checkbox {margin-top: 0px;margin-bottom: 0px;}
			.panel-body .list-group {margin-bottom: 0;}
			.margin-bottom-none { margin-bottom: 0; }
			.panel-body .radio label,.panel-body .checkbox label { display:block; }
			.well-sm {padding: 6px !important}
			.well {margin-bottom: 5px !important; border-radius: 3px}

		
	  	</style>
	</body>
</html>
