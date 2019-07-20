			// Sắp xếp
			if(window.sorting_enabled) {
				$scope.sorts = [];
				
				$scope.toggleSorting = function(field) {
					var sortingStatus = $scope.getSortingByField(field);
					if(null === sortingStatus) {
						$scope.sorts.push({
							index: field,
							dir: 'asc'
						});
					} else {
						if(sortingStatus.dir === 'asc') {
							sortingStatus.dir = 'desc';
						} else {
							$scope.removeSortingByField(field);
						}
					}
					$scope.reload();
				};
				$scope.addSorting = function() {
					$scope.sorts.push({});
				};
				$scope.removeSorting = function(index) {
					$scope.sorts.splice(index, 1);
				};
				$scope.getSortingByField = function(field) {
					for(var i = 0; i < $scope.sorts.length; i++) {
						if($scope.sorts[i].index == field) {
							return $scope.sorts[i];
						}
					}
					return null;
				};
				$scope.hasSortingByField = function(field) {
					for(var i = 0; i < $scope.sorts.length; i++) {
						if($scope.sorts[i].index == field) {
							return true;
						}
					}
					return false;
				};
				$scope.isSortingAscByField = function(field) {
					for(var i = 0; i < $scope.sorts.length; i++) {
						if($scope.sorts[i].index == field && $scope.sorts[i].dir == 'asc') {
							return true;
						}
					}
					return false;
				};
				$scope.isSortingDescByField = function(field) {
					for(var i = 0; i < $scope.sorts.length; i++) {
						if($scope.sorts[i].index == field && $scope.sorts[i].dir == 'desc') {
							return true;
						}
					}
					return false;
				};
				$scope.removeSortingByField = function(field) {
					for(var i = 0; i < $scope.sorts.length; i++) {
						if($scope.sorts[i].index == field) {
							$scope.removeSorting(i);
							return true;
						}
					}
					return false;
				};
				$scope.getSort = function() {
					if($scope.sorts.length == 0) {
						return $scope.sort;
					}
					var sorts = [];
					for(var i = 0; i < $scope.sorts.length; i++) {
						if(typeof $scope.sorts[i].index !== 'undefined' && typeof $scope.sorts[i].dir !== 'undefined') {
							sorts.push($scope.sorts[i].index + ' ' + $scope.sorts[i].dir);
						}
					}
					return sorts.join(', ');
				};
			}
			// Kết thúc sắp xếp