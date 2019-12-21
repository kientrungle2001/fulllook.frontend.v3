qlhsApp.factory('student_get_advices', function() {
  return function($scope) {
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
        $scope.advices = resp.rows;
        $scope.$apply();
      }
    });
  };
});