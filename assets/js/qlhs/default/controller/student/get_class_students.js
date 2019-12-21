qlhsApp.factory('student_get_class_students', function() {
  return function($scope) {
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
        $scope.class_students = resp.rows;
        $scope.$apply();
      }
    });
  }
});