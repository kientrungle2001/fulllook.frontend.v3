flApp.controller('englishTestListController', ['$scope', function($scope) {
	$scope.englishTests = [];
	$scope.categoryId = '1411';
	$scope.loadData = function() {
		var englishTestList = cacheStorage.getItem('english_test_list');
		if(englishTestList) {
			$scope.englishTests = englishTestList;
		} else {
			jQuery.ajax({
				type: 'post',
				url: FL_API_URL +'/common/getTests', 
				data: {
					categoryId: '1411'
				},
				dataType: 'json',
				success: function(resp) {
					cacheStorage.setItem('english_test_list', resp);
					$scope.englishTests = resp;
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
	$scope.selectEnglishTestPage = function(page) {
		$scope.selectedEnglishTestPage = page;
		$scope.$apply();
	};
}]);