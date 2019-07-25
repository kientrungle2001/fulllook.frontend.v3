<script>
angular.module(‘myApp')
    .directive('loginForm', function() {
        return {
            templateUrl: 'app/directives/loginForm/loginForm.html',
            restrict: 'E',
            require:'alertForm',
            scope: {
                successCallback: '&',
                errorCallback: '&',
                emailField: '='
            },
            link: function (scope, element, attrs, alertFormCtrl) {
                scope.alertFormCtrl = alertFormCtrl;
            },
            controller: function ($rootScope, $scope, authenticationService) {
                $scope.loginFormData = {};
                $scope.inProgress = false;
                $scope.onLogin = function (form) {
                    if (form.$valid) {
                        $scope.inProgress = true;
                        authenticationService.loginUser('password', $scope.loginFormData).then(function () {
                            $scope.successCallback({formData: $scope.loginFormData});
                        }, function (err) {
                            $scope.inProgress = false;
                            if (err.message) {
                                // Calling showAlert function of alertFormCtrl
                               $scope.alertFormCtrl.showAlert();
                            }
                        });
                    }
                }
            }
        };
	});

	</script>