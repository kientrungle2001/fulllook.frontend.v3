/** Factories */
qlhsApp.factory('get_classes', function() {
	return function($scope) {
		proxy_get({
      url: QLHS_CONSTANTS.api.v1.classes.url + '/items/classes',
      type: AJAX_CONSTANTS.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          status: 1,
          online: 0
        }
      },
      success: function(resp) {
        $scope.classes = resp.rows;
        $scope.$apply();
      }
    });
    $scope.get_class_levels = function(classes) {
      if(!classes) return [];
      var result = [];
      classes.forEach(function(cls) {
        result.pushIfNotExisted(cls.level);
      });
      result.sort();
      return result;
    };
  };
});

qlhsApp.factory('get_teachers', function() {
	return function($scope) {
		proxy_get({
      url: QLHS_CONSTANTS.api.v1.teacher.url + '/items/teacher',
      type: AJAX_CONSTANTS.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 30,
        where: {
          status: 1
        }
      },
      success: function(resp) {
        $scope.teachers = resp.rows;
        $scope.$apply();
      }
    });
	};
});