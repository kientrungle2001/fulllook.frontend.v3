flApp.controller('testDetailController', ['$scope', function($scope) {
	
	$scope.category_id = parseInt(category_id);
	$scope.test_id = parseInt(test_id);
	
	$scope.loadCategory = function() {
		if($scope.category_id) {
			var category = cacheStorage.getItem('category_' + $scope.category_id);
			if(null !== category) {
				$scope.category = category;
			} else {
				proxy_ajax({
					url: FL_API_URL + '/corecategories/' + $scope.category_id,
					type: 'get', dataType: 'json', success: function(category) {
						cacheStorage.setItem('category_' + $scope.category_id, category);
						$scope.category = category;
						$scope.$apply();
					}
				});
			}
		}
	};

	$scope.loadTests = function() {
		if($scope.category_id) {
			var tests = cacheStorage.getItem('category_tests_' + $scope.category_id);
			if(null !== tests) {
				$scope.tests = tests;
			} else {
				proxy_ajax({
					url: FL_API_URL + '/educationtests',
					type: 'get', dataType: 'json', 
					data: {
						where: {
							categoryIds: {like: '%,' + $scope.category_id + ',%'},
							status: 1, 
							software: 1,
							classes: {like: '%,5,%'}
						},
						sort: 'ordering asc',
						limit: 1000
					},
					success: function(tests) {
						cacheStorage.setItem('category_tests_' + $scope.category_id, tests);
						$scope.tests = tests;
						$scope.$apply();
					}
				});
			}
			
		}
	};

	$scope.loadTest = function() {
		if($scope.test_id) {
			var test = cacheStorage.getItem('test_' + $scope.test_id);
			if(null !== test) {
				$scope.test = test;
			} else {
				proxy_ajax({
					url: FL_API_URL + '/educationtests/' + $scope.test_id,
					type: 'get', dataType: 'json', success: function(test) {
						cacheStorage.setItem('test_' + $scope.test_id, test)
						$scope.test = test;
						$scope.$apply();
					}
				});
			}
			
		}
	};
	
	$scope.loadCategory();
	$scope.loadTests();
	$scope.loadTest();
}]);