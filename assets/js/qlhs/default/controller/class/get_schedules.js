qlhsApp.factory("class_get_schedules", function() {
	return function($scope, classIds) {
    if(!classIds || classIds.length == 0) {
      $scope.schedules = [];
      $scope.$apply(); 
      return true;
    }
		proxy_get({
      url: QC.api.v1.schedule.url + '/items/schedule',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'studyDate desc, studyTime desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          classId: classIds
        }
      },
      success: function(resp) {
        $scope.schedules = resp.rows;
        $scope.$apply();
      }
    });
	};
});
