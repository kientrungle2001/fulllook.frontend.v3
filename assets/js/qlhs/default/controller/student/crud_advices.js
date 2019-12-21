qlhsApp.factory('crud_student_advices', function() {
  return function($scope) {
    $scope.a_advice = {};
    $scope.insert_advice = function(row) {
      row.studentId = $scope.selected_row.id;
      jQuery('#modal_advice').modal('hide');
      proxy_post({
        url: QLHS_CONSTANTS.api.v1.advice.url + '/insert/advice',
        data: {
          item: angular.copy(row)
        },
        success: function(resp) {
          console.log(resp);
          $scope.get_advices();
        }
      });
    };

    $scope.edit_advice = function(advice) {
      $scope.e_advice = angular.copy(advice);
      jQuery('#modal_edit_advice').modal('show');
    };

    $scope.update_advice = function(row) {
      jQuery('#modal_edit_advice').modal('hide');
      proxy_post({
        url: QLHS_CONSTANTS.api.v1.advice.url + '/update/advice/' + row.id,
        data: {
          item: angular.copy(row)
        },
        success: function(resp) {
          console.log(resp);
          $scope.get_advices();
        }
      });
    };

    $scope.remove_advice = function(row) {
      if(confirm('Bạn có muốn xóa tư vấn: ' + row.content)) {
        proxy_post({
          url: QLHS_CONSTANTS.api.v1.advice.url + '/remove/advice/' + row.id,
          success: function(resp) {
            console.log(resp);
            $scope.get_advices();
          }
        });
      }
    };
  };
});