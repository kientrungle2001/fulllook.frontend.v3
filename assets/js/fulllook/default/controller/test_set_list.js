flApp.controller('testSetListController', ['$scope', function($scope) {
	
	var testSets = cacheStorage.getItem('test_sets');
	if(null !== testSets) {
		$scope.testSets = testSets;
	} else {
		$scope.testSets = [];
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/common/getTestSets', 
			data: {
				categoryId: '1413'
			},
			dataType: 'json',
			success: function(resp) {
				testSets = buildBottomTree(resp);
				cacheStorage.setItem('test_sets', testSets);
				$scope.testSets = testSets;
				$scope.$apply();
			}
		});
	}
	
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
	$scope.selectTestSetPage = function (page) {
		$scope.selectedTestSetPage = page;
	};
}]);