qlhsApp.controller('student_controller', ['$scope', 'tai_danh_sach_giao_vien', function($scope, tai_danh_sach_giao_vien) {
  $scope.pageNum = 0;
  $scope.pageSize = 10;
  $scope.pageSizes = [10, 20, 30, 40, 50, 100, 200];
  $scope.tai_danh_sach = function() {
    proxy_get({
      url: QLHS_CONSTANTS.api.v1.student.url + '/items/student',
      type: AJAX_CONSTANTS.get, dataType: 'json',
      data: {
        keyword: $scope.keyword,
        search_fields: ['name','code', 'phone', 'email'],
        sort: 'id desc',
        pageNum: $scope.pageNum,
        pageSize: $scope.pageSize,
        where: {
          classed: 1,
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

  $scope.tai_danh_sach_giao_vien = function() {
    tai_danh_sach_giao_vien($scope);
  };

  // Phân trang
  $scope.go_to_first = function() {
    $scope.pageNum = 0;
    $scope.tai_danh_sach();
  };

  $scope.go_to_last = function() {
    $scope.pageNum = $scope.pages - 1;
    $scope.tai_danh_sach();
  };
  
  $scope.go_to_next = function() {
    $scope.pageNum++;
    $scope.tai_danh_sach();
  };

  $scope.go_to_prev = function() {
    if($scope.pageNum > 0) {
      $scope.pageNum--;
      $scope.tai_danh_sach();
    }
  }

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
    // Do Nothing
  };
  $scope.select_tab_class_schedule_list = function() {
    $scope.tai_danh_sach_xep_lop();
  };
  $scope.tai_danh_sach_xep_lop = function() {
    proxy_get({
      url: QC.api.v1.class_student.url + '/items/class_student',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 100,
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
  $scope.select_tab_advice = function() {
    $scope.tai_danh_sach_tu_van();
  };
  $scope.tai_danh_sach_tu_van = function() {
    proxy_get({
      url: QC.api.v1.advice.url + '/items/advice',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_tu_van = resp.rows;
        $scope.$apply();
      }
    });
  };

  $scope.select_tab_fee = function() {
    $scope.tai_danh_sach_hoc_phi();
  };
  $scope.tai_danh_sach_hoc_phi = function() {
    proxy_get({
      url: QC.api.v1.general_order.url + '/items/general_order',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_hoc_phi = resp.rows;
        $scope.$apply();
      }
    });
  };

  $scope.select_tab_timesheet = function() {
    $scope.tai_danh_sach_thoi_khoa_bieu();
  };

  $scope.tai_danh_sach_thoi_khoa_bieu = function() {
    proxy_get({
      url: QC.api.v1.student_schedule.url + '/items/student_schedule',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_thoi_khoa_bieu = resp.rows;
        $scope.$apply();
      }
    });
  };

  $scope.select_tab_using = function() {
    $scope.tai_danh_sach_da_su_dung();
  };

  $scope.tai_danh_sach_da_su_dung = function() {
    proxy_get({
      url: QC.api.v1.student_order.url + '/items/student_order',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_da_su_dung = resp.rows;
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
  $scope.order_rows = {};
  $scope.toggle_detail_row = function(row) {
    $scope.detail_rows[row.id] = !$scope.detail_rows[row.id];
    if($scope.detail_rows[row.id]) {
      $scope.tai_danh_sach_hoc_phi();
      setTimeout(function() {
        $scope.order_rows[row.id] = angular.copy($scope.danh_sach_hoc_phi);
        $scope.$apply();
      }, 200);
      
    }
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
    console.log(class_schedule);
    // TODO:
    var that = this;
    if(!$scope.selected_row) {
      alert('Chọn một học sinh để xếp lớp');
      return false;
    }
    if(!class_schedule.classId) {
      alert('Chọn một lớp để xếp lớp');
      return false;
    }
    if(!class_schedule.startClassDate) {
      alert('Chọn ngày để xếp lớp');
      return false;
    }
    class_schedule.studentId = $scope.selected_row.id;
    proxy_post({
      url: QC.api.v1.class_student.url + '/insert/class_student',
      data: {
        item: angular.copy(class_schedule)
      },
      success: function(resp) {
        that.tai_danh_sach();
      }
    });
  };

  $scope.remove_class_schedule = function(class_schedule) {
    var that = this;
    if(confirm('Bạn có muốn xóa xếp lớp?')) {
      proxy_post({
        url: QC.api.v1.class_student.url + '/remove/class_student/' + class_schedule.id,
        success: function(resp) {
          that.tai_danh_sach_xep_lop();
        }
      });
    }
  };

  $scope.edit_class_schedule = function(xep_lop) {
    // TODO:
    $scope.selected_class_schedule = angular.copy(xep_lop);
    $('#edit_class_schedule').modal('show');
  };

  $scope.update_class_schedule = function(class_schedule) {
    var that = this;
    proxy_post({
      url: QC.api.v1.class_student.url + '/update/class_student/' + class_schedule.id,
      data: {
        item: angular.copy(class_schedule)
      },
      success: function(resp) {
        that.tai_danh_sach_xep_lop();
      }
    });
  }

  $scope.change_class_schedule = function(class_schedule) {
    // TODO:
    // update old class schedule
    var that = this;
    if(!$scope.selected_row) {
      alert('Chọn một học sinh để xếp lớp');
      return false;
    }
    if(!class_schedule.fromClassId) {
      alert('Chọn một lớp để chuyển');
      return false;
    }
    if(!class_schedule.toClassId) {
      alert('Chọn một lớp cần chuyển tới');
      return false;
    }
    if(!class_schedule.changeDate) {
      alert('Chọn ngày để xếp lớp');
      return false;
    }
    proxy_post({
      url: QC.api.v1.class_student.url + '/update_all/class_student/' + class_schedule.id,
      data: {
        item: {
          classId: class_schedule.fromClassId,
          endClassDate: class_schedule.changeDate
        },
        where: {
          studentId: $scope.selected_row.id,
          classId: class_schedule.fromClassId
        }
      },
      success: function() {
        proxy_post({
          url: QC.api.v1.class_student.url + '/insert/class_student',
          data: {
            item: {
              studentId: $scope.selected_row.id,
              classId: class_schedule.fromClassId,
              startClassDate: class_schedule.changeDate
            }
          },
          success: function() {
            that.tai_danh_sach_xep_lop();
          }
        });
      }
    });
    // add new class schedule
  };

  $scope.stop_class_schedule = function(class_schedule) {
    // TODO:
    var that = this;
    if(!$scope.selected_row) {
      alert('Chọn một học sinh để dừng học');
      return false;
    }
    if(!class_schedule.fromClassId) {
      alert('Chọn một lớp để dừng học');
      return false;
    }
    if(!class_schedule.stopDate) {
      alert('Chọn ngày để dừng học');
      return false;
    }
    proxy_post({
      url: QC.api.v1.class_student.url + '/update_all/class_student/' + class_schedule.id,
      data: {
        item: {
          classId: class_schedule.fromClassId,
          endClassDate: class_schedule.stopDate
        },
        where: {
          studentId: $scope.selected_row.id,
          classId: class_schedule.fromClassId
        }
      },
      success: function() {
        that.tai_danh_sach_xep_lop();
      }
    });
  };

  $scope.tai_danh_sach();
  $scope.tai_danh_sach_giao_vien();
}]);