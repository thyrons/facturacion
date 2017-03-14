// create the controller and inject Angular's $scope
angular.module('scotchApp').controller('mainController', function ($scope, $route) {
	$scope.$route = $route;
});