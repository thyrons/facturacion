<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Ingreso al Sistema</title>
    <meta name="description" content="Facturación Electrónica Acción Imbaburapak" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../dist/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="../dist/css/fonts.googleapis.com.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="../dist/css/ace.min.css" />
    <!--[if lte IE 9]>
      <link rel="stylesheet" href="../dist/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="../dist/css/ace-rtl.min.css" />
    <!--[if lte IE 9]>
      <link rel="stylesheet" href="../dist/css/ace-ie.min.css" />
    <![endif]-->
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    <!--[if lte IE 8]>
    <script src="../dist/js/html5shiv.min.js"></script>
    <script src="../dist/js/respond.min.js"></script>
    <![endif]-->    
    
    
    <link rel="stylesheet" href="../dist/css/fontdc.css" />
    <link rel="stylesheet" href="../dist/css/jquery.gritter.min.css" />
    
    
    <link rel="stylesheet" href="../dist/css/animate.min.css" />
  </head>

  <body class="login-layout">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1>
                  <i class="ace-icon fa fa-leaf green"></i>
                  <span class="red">Facturación </span>
                  <span class="white" id="id-text2">AI</span>
                </h1>
                <h4 class="blue" id="id-company-text">&copy; Acción Imbaburapak</h4>
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Ingrese su Información
                      </h4>
                      <div class="space-6"></div>
                      <form id="form_login" name="form_login">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" id="txt_1" name="txt_1" class="form-control" placeholder="Username" />
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" id="txt_2" name="txt_2" class="form-control" placeholder="Password" />
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>

                          <div class="space"></div>

                          <div class="clearfix">                            
                            <button type="submit" id="btn_2" name="btn_2" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Ingresar</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>                                        
                    </div><!-- /.widget-main -->

                    <div class="toolbar clearfix">                      
                      <div>
                        <a href="#" data-target="" class="user-signup-link">
                          Facturación Electrónica
                        </a>
                      </div>                       
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->                               
              </div><!-- /.position-relative -->              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.main-content -->
      </div><!-- /.main-container -->
    </div>
    <!-- basic scripts -->
    <!--[if !IE]> -->
    <script src="../dist/js/jquery-2.1.4.min.js"></script>
    <!-- <![endif]-->
    <!--[if IE]>
    <script src="../dist/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>      
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/jquery.validate.min.js"></script>
    <script src="../dist/js/jquery.gritter.min.js"></script>
    <script src="../dist/js/lockr.min.js"></script>
    <script src="../dist/js/ace-elements.min.js"></script>
    <script src="../dist/js/ace.min.js"></script>
    <script src="login.js"></script>      
  </body>
</html>
