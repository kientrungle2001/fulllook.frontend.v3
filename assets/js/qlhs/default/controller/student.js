qlhsApp.controller('student_controller', ['$scope', function($scope) {
  $scope.pageNum = 0;
  $scope.pageSize = 10;
  $scope.pageSizes = [10, 20, 30, 40, 50, 100, 200];
  $scope.tai_danh_sach = function() {
    proxy_get({
      url: QLHS_CONSTANTS.api.v1.student.url + '/items/student',
      type: AJAX_CONSTANTS.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: $scope.pageNum,
        pageSize: $scope.pageSize,
        where: {
          currentClassIds: $scope.selected_class ?  $scope.selected_class : null
        }
      },
      success: function(resp) {
        $scope.rows = resp.rows;
        $scope.total = resp.total;
        $scope.pages = Math.ceil($scope.total / $scope.pageSize);
        $scope.$apply();
      }
    });
  };
  $scope.select_row = function(row) {
    $scope.selected_row = row;
  };
  $scope.is_selected_row = function(row) {
    if($scope.selected_row)
      return $scope.selected_row.id == row.id;
    return false;
  }
  $scope.detail_rows = {};
  $scope.toggle_detail_row = function(row) {
    $scope.detail_rows[row.id] = !$scope.detail_rows[row.id];
  };
  $scope.is_detail_visible = function(row) {
    return !!$scope.detail_rows[row.id];
  }
  $scope.open_sign_row = function(row) {
    return $scope.is_detail_visible(row) ? '-' : '+';
  }
  $scope.tai_danh_sach();
}]);