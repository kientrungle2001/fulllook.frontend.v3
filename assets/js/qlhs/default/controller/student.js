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
  };
  $scope.open_sign_row = function(row) {
    return $scope.is_detail_visible(row) ? '-' : '+';
  };
  $scope.add = function() {
    jQuery('#modal_add_student').modal('show');
  };
  $scope.edit = function(row) {
    $scope.erow = angular.copy(row);
    jQuery('#modal_edit_student').modal('show');
  };

  $scope.insert = function(row) {
    // do save student
    jQuery('#modal_add_student').modal('hide');
    proxy_post({
      url: QLHS_CONSTANTS.api.v1.student.url + '/insert/student',
      data: {
        item: angular.copy(row)
      },
      success: function(resp) {
        console.log(resp);
        $scope.tai_danh_sach();
      }
    });
  };

  $scope.update = function(row) {
    // do save student
    jQuery('#modal_edit_student').modal('hide');
    proxy_post({
      url: QLHS_CONSTANTS.api.v1.student.url + '/update/student/' + row.id,
      data: {
        item: angular.copy(row)
      },
      success: function(resp) {
        console.log(resp);
        $scope.tai_danh_sach();
      }
    });
  };

  $scope.tai_danh_sach();
}]);