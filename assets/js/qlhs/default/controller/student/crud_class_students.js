qlhsApp.factory('crud_class_students', function() {
  return function($scope) {
    $scope.add_class_student = function(class_student) {
      console.log(class_student);
      // TODO:
      var that = this;
      if(!$scope.selected_row) {
        alert('Chọn một học sinh để xếp lớp');
        return false;
      }
      if(!class_student.classId) {
        alert('Chọn một lớp để xếp lớp');
        return false;
      }
      if(!class_student.startClassDate) {
        alert('Chọn ngày để xếp lớp');
        return false;
      }
      class_student.studentId = $scope.selected_row.id;
      proxy_post({
        url: QC.api.v1.class_student.url + '/insert/class_student',
        data: {
          item: angular.copy(class_student)
        },
        success: function(resp) {
          that.get_list();
        }
      });
    };
  
    $scope.remove_class_student = function(class_student) {
      var that = this;
      if(confirm('Bạn có muốn xóa xếp lớp?')) {
        proxy_post({
          url: QC.api.v1.class_student.url + '/remove/class_student/' + class_student.id,
          success: function(resp) {
            that.get_class_students();
          }
        });
      }
    };
  
    $scope.edit_class_student = function(xep_lop) {
      // TODO:
      $scope.selected_class_student = angular.copy(xep_lop);
      $('#edit_class_student').modal('show');
    };
  
    $scope.update_class_student = function(class_student) {
      var that = this;
      proxy_post({
        url: QC.api.v1.class_student.url + '/update/class_student/' + class_student.id,
        data: {
          item: angular.copy(class_student)
        },
        success: function(resp) {
          that.get_class_students();
        }
      });
    }
  
    $scope.change_class_student = function(class_student) {
      // TODO:
      // update old class schedule
      var that = this;
      if(!$scope.selected_row) {
        alert('Chọn một học sinh để xếp lớp');
        return false;
      }
      if(!class_student.fromClassId) {
        alert('Chọn một lớp để chuyển');
        return false;
      }
      if(!class_student.toClassId) {
        alert('Chọn một lớp cần chuyển tới');
        return false;
      }
      if(!class_student.changeDate) {
        alert('Chọn ngày để xếp lớp');
        return false;
      }
      proxy_post({
        url: QC.api.v1.class_student.url + '/update_all/class_student/' + class_student.id,
        data: {
          item: {
            classId: class_student.fromClassId,
            endClassDate: class_student.changeDate
          },
          where: {
            studentId: $scope.selected_row.id,
            classId: class_student.fromClassId
          }
        },
        success: function() {
          proxy_post({
            url: QC.api.v1.class_student.url + '/insert/class_student',
            data: {
              item: {
                studentId: $scope.selected_row.id,
                classId: class_student.fromClassId,
                startClassDate: class_student.changeDate
              }
            },
            success: function() {
              that.get_class_students();
            }
          });
        }
      });
      // add new class schedule
    };
  
    $scope.stop_class_student = function(class_student) {
      // TODO:
      var that = this;
      if(!$scope.selected_row) {
        alert('Chọn một học sinh để dừng học');
        return false;
      }
      if(!class_student.fromClassId) {
        alert('Chọn một lớp để dừng học');
        return false;
      }
      if(!class_student.stopDate) {
        alert('Chọn ngày để dừng học');
        return false;
      }
      proxy_post({
        url: QC.api.v1.class_student.url + '/update_all/class_student/' + class_student.id,
        data: {
          item: {
            classId: class_student.fromClassId,
            endClassDate: class_student.stopDate
          },
          where: {
            studentId: $scope.selected_row.id,
            classId: class_student.fromClassId
          }
        },
        success: function() {
          that.get_class_students();
        }
      });
    };
  };
});