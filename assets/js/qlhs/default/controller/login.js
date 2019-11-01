qlhsApp.controller('loginController', ['$scope', function($scope) {
	$scope.checkIsLogedIn = function () {
		return window.sessionAdminId !== '';
	};
	
	$scope.login = {};
	$scope.doLogin = function(url) {
		if(!$scope.login.username || !$scope.login.password){
			return false;
		}
		$scope.login.url = url;
		jQuery.post(QLHS_API_URL+'/user/login', angular.copy($scope.login), function(resp) {
			$scope.login.success = resp.success;
			$scope.login.message = resp.message;
			$scope.$apply();
			if(resp.success) {
				window.location = resp.url;
			}
		});
	};
}]);