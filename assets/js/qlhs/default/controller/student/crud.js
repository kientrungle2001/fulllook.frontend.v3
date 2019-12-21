qlhsApp.factory('student_crud', function() {
  return function($scope) {
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
          $scope.get_list();
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
          $scope.get_list();
        }
      });
    };
  
    $scope.remove = function(row) {
      if(confirm('Delete #' + row.id + '?')) {
        proxy_post({
          url: QLHS_CONSTANTS.api.v1.student.url + '/remove/student/' + row.id,
          success: function(resp) {
            $scope.get_list();
          }
        });
      }
      
    };
  }
});