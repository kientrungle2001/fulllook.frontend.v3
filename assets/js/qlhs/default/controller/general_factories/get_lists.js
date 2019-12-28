/** Factories */
qlhsApp.factory('get_classes', function() {
	return function($scope) {
		proxy_get({
      url: QA.classes.url + '/items/classes',
      type: AJC.get, dataType: 'json',
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
      url: QA.teacher.url + '/items/teacher',
      type: AJC.get, dataType: 'json',
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

qlhsApp.factory('get_subjects', function() {
	return function($scope) {
		proxy_get({
      url: QA.subject.url + '/items/subject',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 30,
        where: {
          status: 1
        }
      },
      success: function(resp) {
        $scope.subjects = resp.rows;
        $scope.$apply();
      }
    });
	};
});

qlhsApp.factory('get_payment_periods', function() {
	return function($scope) {
		proxy_get({
      url: QA.payment_period.url + '/items/payment_period',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 30,
        where: {
          status: 1
        }
      },
      success: function(resp) {
        $scope.payment_periods = resp.rows;
        $scope.$apply();
      }
    });
	};
});