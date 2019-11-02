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
  $scope.selected_tab = 'info';
  $scope.selected_row = null;
  $scope.select_row = function(row) {
    $scope.selected_row = row;
    $scope.fetch_data();
  };
  $scope.select_tab = function(tab) {
    $scope.selected_tab = tab;
    $scope.fetch_data();
  };
  $scope.fetch_data = function() {
    if($scope.selected_tab && $scope.selected_row) {
      if(typeof $scope['select_tab_' + $scope.selected_tab] !== 'undefined') {
        $scope['select_tab_' + $scope.selected_tab].call($scope);
      }
    }
  };
  $scope.select_tab_info = function() {
    console.log('show_info');
  };
  $scope.select_tab_class_schedule = function() {
    console.log('class_schedule');
  };
  $scope.select_tab_class_schedule_list = function() {
    console.log('class_schedule_list');
    $scope.tai_danh_sach_xep_lop();
  };
  $scope.tai_danh_sach_xep_lop = function() {
    proxy_get({
      url: QLHS_CONSTANTS.api.v1.class_student.url + '/items/class_student',
      type: AJAX_CONSTANTS.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: $scope.pageNum,
        pageSize: $scope.pageSize,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_xep_lop = resp.rows;
        $scope.$apply();
      }
    });
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

  $scope.remove = function(row) {
    if(confirm('Delete #' + row.id + '?')) {
      proxy_post({
        url: QLHS_CONSTANTS.api.v1.student.url + '/remove/student/' + row.id,
        success: function(resp) {
          $scope.tai_danh_sach();
        }
      });
    }
    
  };

  $scope.add_class_schedule = function(class_schedule) {
    // TODO:
  };

  $scope.change_class_schedule = function(class_schedule) {
    // TODO:
  };

  $scope.stop_class_schedule = function(class_schedule) {
    // TODO:
  };

  $scope.tai_danh_sach();
}]);