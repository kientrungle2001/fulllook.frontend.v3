qlhsApp.factory('crud_student_test_schedules', function() {
  return function($scope) {
    $scope.a_test_schedule = {};
    $scope.insert_test_schedule = function(row) {
      row.studentId = $scope.selected_row.id;
      jQuery('#modal_test_schedule').modal('hide');
      proxy_post({
        url: QLHS_CONSTANTS.api.v1.test_schedule.url + '/insert/test_schedule',
        data: {
          item: angular.copy(row)
        },
        success: function(resp) {
          console.log(resp);
          $scope.get_test_schedules();
        }
      });
    };

    $scope.edit_test_schedule = function(test_schedule) {
      $scope.e_test_schedule = angular.copy(test_schedule);
      jQuery('#modal_edit_test_schedule').modal('show');
    };

    $scope.update_test_schedule = function(row) {
      jQuery('#modal_edit_test_schedule').modal('hide');
      proxy_post({
        url: QLHS_CONSTANTS.api.v1.test_schedule.url + '/update/test_schedule/' + row.id,
        data: {
          item: angular.copy(row)
        },
        success: function(resp) {
          console.log(resp);
          $scope.get_test_schedules();
        }
      });
    };

    $scope.remove_test_schedule = function(row) {
      if(confirm('Bạn có muốn xóa tư vấn: ' + row.content)) {
        proxy_post({
          url: QLHS_CONSTANTS.api.v1.test_schedule.url + '/remove/test_schedule/' + row.id,
          success: function(resp) {
            console.log(resp);
            $scope.get_test_schedules();
          }
        });
      }
    };
  };
});