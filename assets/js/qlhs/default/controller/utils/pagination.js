qlhsApp.factory('utils_pagination', function() {
  return function($scope) {
    $scope.pageNum = 0;
    $scope.pageSize = 10;
    $scope.pageSizes = [10, 20, 30, 40, 50, 100, 200];
    $scope.go_to_first = function() {
      $scope.pageNum = 0;
      $scope.get_list();
    };
  
    $scope.go_to_last = function() {
      $scope.pageNum = $scope.pages - 1;
      $scope.get_list();
    };
    
    $scope.go_to_next = function() {
      $scope.pageNum++;
      $scope.get_list();
    };
  
    $scope.go_to_prev = function() {
      if($scope.pageNum > 0) {
        $scope.pageNum--;
        $scope.get_list();
      }
    }
  };
});