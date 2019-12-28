qlhsApp.factory("student_get_test_schedules", function() {
	return function($scope) {
		proxy_get({
      url: QC.api.v1.test_schedule.url + '/items/test_schedule',
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
        $scope.test_schedules = resp.rows;
        $scope.$apply();
      }
    });
	};
});
