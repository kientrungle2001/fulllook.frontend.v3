<?php if(0): ?>
<script>
<?php endif;?>
			// load dữ liệu cho grid
			$scope.load = function() {
				var data = { where: {software: 1}, sort: $scope.getSort(), fields: 'id,name,name_vn,classes,status,trial,ordering,parent', pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				categories_ajax(data, function(result) {
						var items = result.rows;
						items = buildBottomTree(items);
						items = treefy(items, 0);
						console.log(items);
						$scope.items = items;
						$scope.total = result.total;
						$scope.total_pages = Math.ceil(parseInt($scope.total) / parseInt($scope.pageSize));
						var items = result.rows;
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
			}
<?php if(0): ?>
</script>
<?php endif;?>