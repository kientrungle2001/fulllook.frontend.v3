qlhsApp.controller('classes_list_controller', ['$scope', 'get_classes', function($scope, get_classes) {
  $scope.get_classes = function() {
    get_classes($scope);
  };
  $scope.get_classes();
  $scope.get_class_levels = function(classes) {
    if(!classes) return [];
    var result = [];
    classes.forEach(function(cls) {
      result.pushIfNotExisted(cls.level);
    });
    result.sort();
    return result;
  };
}]);