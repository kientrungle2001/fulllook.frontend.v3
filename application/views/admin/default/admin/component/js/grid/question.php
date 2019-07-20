<?php if(0): ?>
<script>
<?php endif;?>
			// load dữ liệu cho grid
			$scope.load = function() {
				var data = { where: {software: 1}, sort: $scope.getSort(), pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				questions_ajax(data, function(result) {
						$scope.items = result.rows;
						$scope.total = result.total;
						$scope.total_pages = Math.ceil(parseInt($scope.total) / parseInt($scope.pageSize));
						var items = result.rows;
						var categoryIds = items.collectIds('categoryIds');
						var testIds = items.collectIds('testId');
						var teacherIds = items.collectIds('teacherIds');
						
						categories_ajax_set(categoryIds, function(result) {
							$scope.categories = result.rows;
							$scope.$apply();
						});
					
						tests_ajax_set(testIds, function(result) {
							$scope.tests = result.rows;
							$scope.$apply();
						});
						
						teachers_ajax_set(teacherIds, function(result) {
							$scope.teachers = result.rows;
							$scope.$apply();
						});
						
						$scope.$apply();
					});
			};

			
			
			// Grid multi values fields
			if(window.multiple_values_enabled) {
				$scope.categories = false;
				$scope.categories_of = function(catIds) {
					if($scope.categories) {
						return $scope.categories.joinField(catIds, 'name');
					} else {
						return '';
					}
				};

				$scope.tests = false;
				$scope.tests_of = function(testIds) {
					if($scope.tests) {
						return $scope.tests.joinField(testIds, 'name');
					} else {
						return '';
					}
				};

				$scope.teachers = false;
				$scope.teachers_of = function(teacherIds) {
					if($scope.teachers) {
						return $scope.teachers.joinField(teacherIds, 'name');
					} else {
						return '';
					}
				};
			}
<?php if(0): ?>
</script>
<?php endif;?>