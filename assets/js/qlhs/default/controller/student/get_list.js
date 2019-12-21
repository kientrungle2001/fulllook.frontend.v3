qlhsApp.factory('student_get_list', function() {
  return function($scope) {
    proxy_get({
      url: QA.student.url + '/items/student',
      type: AJC.get, dataType: 'json',
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
});