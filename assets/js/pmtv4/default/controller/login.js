flApp.controller('loginController', ['$scope', function($scope) {
	$scope.checkIsLogedIn = function () {
		return window.sessionUserId !== '';
	};

	$scope.checkIsPaid = function () {
		return window.checkPayment === '1';
	};
	var areaCodes = cacheStorage.getItem('areaCodes');
	if(null !== areaCodes) {
		$scope.areaCodes = areaCodes;
	} else {
		$scope.areaCodes = [];
		proxy_ajax({url: FL_API_URL +'/register/getAreaCode', success: function(resp) {
			cacheStorage.setItem('areaCodes', resp);
			$scope.areaCodes = resp;
			$scope.$apply();
		}});
	}
	
	
	$scope.login = {};
	$scope.doLogin = function(url) {
		if(!$scope.login.username || !$scope.login.password){
			return false;
		}
		$scope.login.url = url;
		jQuery.post(FL_API_URL+'/login/userLogin', angular.copy($scope.login), function(resp) {
			$scope.login.success = resp.success;
			$scope.login.message = resp.message;
			$scope.$apply();
			if(resp.success) {
				window.location = resp.url;
			}
			
		});
	};

	$scope.register = {};
	$scope.doRegister = function (url) {
		if (!$scope.register.username || !$scope.register.name || !$scope.register.password || !$scope.register.repassword || !$scope.register.phone || !$scope.register.email || !$scope.register.sex || !$scope.register.areacode) {
			return false;
		}
		$scope.register.url = url;
		if ($scope.register.password == $scope.register.repassword) {
			jQuery.post(FL_API_URL + '/register/userRegister', $scope.register, function (resp) {
				$scope.register.success = resp.success;
				$scope.register.message = resp.message;
				$scope.$apply();
				if (resp.success) {
					window.location = resp.url;
				}
			});

		} else {
			$scope.register.success = 0;
			$scope.register.message = "Mật khẩu tài khoản nhập lại không chính xác";

		}

	};
}]);