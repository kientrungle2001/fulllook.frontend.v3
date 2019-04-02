flApp.controller('realTestSetListController', ['$scope', function($scope) {
	var realTestSets = cacheStorage.getItem('real_test_sets');
	if(null !== realTestSets) {
		$scope.realTestSets = realTestSets;
	} else {
		$scope.realTestSets = [];
		jQuery.ajax({
			type: 'post',
			url: FL_API_URL +'/common/getTestSets', 
			data: {
				categoryId: '1414'
			},
			dataType: 'json',
			success: function(resp) {
				realTestSets = buildBottomTree(resp);
				cacheStorage.setItem('real_test_sets', realTestSets);
				$scope.realTestSets = realTestSets;
				$scope.$apply();
			}
		});
	}
}]);