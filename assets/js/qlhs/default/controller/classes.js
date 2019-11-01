qlhsApp.controller('classes_list_controller', ['$scope', 'tai_danh_sach_lop', function($scope, tai_danh_sach_lop) {
  $scope.tai_danh_sach_lop = function() {
    tai_danh_sach_lop($scope);
  };
  $scope.tai_danh_sach_lop();
}]);