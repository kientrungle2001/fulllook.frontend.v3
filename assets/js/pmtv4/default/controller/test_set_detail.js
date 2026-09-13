flApp.controller('testSetDetailController', ['$scope', function($scope) {
	
	$scope.category_id = parseInt(category_id);
	$scope.test_set_id = parseInt(test_set_id);
	$scope.test_id = parseInt(test_id);
	
	$scope.loadCategory = function() {
		if($scope.category_id) {
			var category = cacheStorage.getItem('test_set_category_' + $scope.category_id);
			if(null !== category) {
				$scope.category
			} else {
				proxy_ajax({
					url: FL_API_URL + '/corecategories/' + $scope.category_id,
					data: {
						select: 'id,name,name_vn,trial'
					},
					type: 'get', dataType: 'json', success: function(category) {
						cacheStorage.setItem('test_set_category_' + $scope.category_id, category);
						$scope.category = category;
						$scope.$apply();
					}
				});
			}
		}
	};

	$scope.loadTests = function() {
		if($scope.category_id) {
			var tests = cacheStorage.getItem('test_set_tests_' + $scope.category_id);
			var testSets = cacheStorage.getItem('test_set_testsets_' + $scope.category_id);
			if(null !== tests) {
				$scope.tests = tests;
				$scope.testSets = testSets;
				$scope.loadTestSet();
				$scope.loadTest();
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
						select: 'id,name,name_en,name_sn,trial,parent,trytest,quantity,time',
						sort: 'ordering asc',
						limit: 1000
					},
					success: function(tests) {
						var testSetTree = buildBottomTree(tests);
						cacheStorage.setItem('test_set_tests_' + $scope.category_id, tests);
						cacheStorage.setItem('test_set_testsets_' + $scope.category_id, testSetTree);
						$scope.tests = tests;
						$scope.testSets = testSetTree;
						$scope.loadTestSet();
						$scope.loadTest();
						$scope.$apply();
					}
				});
			}
			
		}
	};

	$scope.loadTest = function() {
		if($scope.test_id) {
			for(var i = 0; i < $scope.tests.length; i++) {
				if($scope.tests[i].id == $scope.test_id) {
					$scope.test = $scope.tests[i];
					return $scope.test;
				}
			}
		}
	};

	$scope.loadTestSet = function() {
		if($scope.test_set_id) {
			for(var i = 0; i < $scope.testSets.length; i++) {
				if($scope.testSets[i].id == $scope.test_set_id) {
					$scope.testSet = $scope.testSets[i];
					return $scope.testSet;
				}
			}
		}
	};
	
	$scope.loadCategory();
	$scope.loadTests();
	
}]);