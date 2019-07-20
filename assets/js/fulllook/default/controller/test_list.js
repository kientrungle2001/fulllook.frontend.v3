flApp.controller('testListController', ['$scope', function($scope) {
	$scope.tests = [];
	$scope.categoryId = '1412';
	
	
	$scope.loadData = function() {
		var tests = cacheStorage.getItem('test_list');	
		if(null !== tests) {
			$scope.tests = tests;
		} else {
			proxy_ajax({
				type: 'post',
				url: FL_API_URL +'/common/getTests', 
				data: {
					categoryId: '1412'
				},
				dataType: 'json',
				success: function(resp) {
					cacheStorage.setItem('test_list', resp);
					$scope.tests = resp;
					$scope.$apply();
				}
			});
		}
	};

	$scope.loadData();
	
	$scope.inPage = function(index, page, pageSize) {
		return (index >= page * pageSize) && (index < (page + 1) * pageSize);
	};
	$scope.totalPage = function(numberOfItem, pageSize) {
		var rs = Math.ceil(numberOfItem / pageSize);
		return rs;
	};
	$scope.range = function(min, max, step) {
		var rs = [];
		for(var i = min; i <= max; i+= step) {
			rs.push(i);
		}
		return rs;
	};
	$scope.selectTestPage = function(page) {
		$scope.selectedTestPage = page;
		$scope.$apply();
	};
}]);