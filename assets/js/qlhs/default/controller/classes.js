qlhsApp.controller('classes_list_controller', ['$scope', 'get_classes', function($scope, get_classes) {
  $scope.get_classes = function() {
    get_classes($scope);
  };
  $scope.get_classes();
}]);