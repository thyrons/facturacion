var dcapp = angular.module('scotchApp', ['ngRoute']);

// configure our routes
dcapp.config(function($routeProvider) {
    $routeProvider
        // route page initial
        .when('/', {
            templateUrl : 'data/home/app.html',
            controller  : 'mainController',
            activetab: 'inicio'
        })        
        // route usuarios
        .when('/usuarios', {
            templateUrl : 'data/usuarios/app.html',
            controller  : 'usuariosController',
            activetab: 'usuarios'
        })  
        // route niveles
        .when('/niveles', {
            templateUrl : 'data/niveles/app.html',
            controller  : 'nivelesController',
            activetab: 'niveles'
        })  
         // route tipo emision                        
        .when('/tipoEmision', {
            templateUrl : 'data/tipoEmision/app.html',
            controller  : 'tipoEmisionController',
            activetab: 'tipoEmision'
        })   
                // route tipo comprobante facturacion electronica
        .when('/tipoComprobante', {
            templateUrl : 'data/tipoComprobante/app.html',
            controller  : 'tipoComprobanteController',
            activetab: 'tipoComprobante'
        })   
                 // route tipo ambiente facturacion electronica
        .when('/tipoAmbiente', {
            templateUrl : 'data/tipoAmbiente/app.html',
            controller  : 'tipoAmbienteController',
            activetab: 'tipoAmbiente'
        })   
                 // route tipo identificacion facturacion electronica
        .when('/tipoIdentificacion', {
            templateUrl : 'data/tipoIdentificacion/app.html',
            controller  : 'tipoIdentificacionController',
            activetab: 'tipoIdentificacion'
        })   
                  // route tipo de impuesto facturacion electronica
        .when('/tipoImpuesto', {
            templateUrl : 'data/tipoImpuesto/app.html',
            controller  : 'tipoImpuestoController',
            activetab: 'tipoImpuesto'
        })   
                  // route tarifa impuesto facturacion electronica
        .when('/tarifaImpuesto', {
            templateUrl : 'data/tarifaImpuesto/app.html',
            controller  : 'tarifaImpuestoController',
            activetab: 'tarifaImpuesto'
        })  
                    // route tipo retencion facturacion electronica
        .when('/tipoRetencion', {
            templateUrl : 'data/tipoRetencion/app.html',
            controller  : 'tipoRetencionController',
            activetab: 'tipoRetencion'
        })   
            // route tarifa retencion facturacion electronica
        .when('/tarifaRetencion', {
            templateUrl : 'data/tarifaRetencion/app.html',
            controller  : 'tarifaRetencionController',
            activetab: 'tarifaRetencion'
        })   
        // route comprobante de Retencion facturacion electronica
        .when('/comprobanteRetencion', {
            templateUrl : 'data/comprobanteRetencion/app.html',
            controller  : 'comprobanteRetencionController',
            activetab: 'comprobanteRetencion'
        })   
        // route de empresa
        .when('/empresa', {
            templateUrl : 'data/empresa/app.html',
            controller  : 'empresaController',
            activetab: 'empresa'
        }) 
        // route de empresa
        .when('/nroDocumento', {
            templateUrl : 'data/nroDocumento/app.html',
            controller  : 'nroDocumentoController',
            activetab: 'nroDocumento'
        }) 
        // route de contribuyentes
        .when('/contribuyentes', {
            templateUrl : 'data/contribuyentes/app.html',
            controller  : 'contribuyentesController',
            activetab: 'contribuyentes'
        })   
                   
});
 
dcapp.factory('Auth', function($location) {
    var user;
    return {
        setUser : function(aUser) {
            user = aUser;
        },
        isLoggedIn : function() {
            var ruta = $location.path();
            var ruta = ruta.replace("/","");
            var accesos = JSON.parse(Lockr.get('users'));
                accesos.push('inicio');
                accesos.push('');

            var a = accesos.lastIndexOf(ruta);
            if (a < 0) {
                return false;    
            } else {
                return true;
            }
        }
    }
});


dcapp.run(['$rootScope', '$location', 'Auth', function ($rootScope, $location, Auth) {
    $rootScope.$on('$routeChangeStart', function (event) {
        var rutablock = $location.path();
        
    });
}]);

    