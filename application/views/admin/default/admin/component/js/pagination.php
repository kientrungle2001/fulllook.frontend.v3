			// Phân trang
			if(window.pagination_enabled){
				$scope.gotoNext = function() {
					$scope.pageNum = parseInt($scope.pageNum) + 1; $scope.reload();
				};

				$scope.gotoPrev = function() {
					$scope.pageNum = parseInt($scope.pageNum) - 1; $scope.reload();
				};

				$scope.gotoFirst = function() {
					$scope.pageNum = 0; $scope.reload();
				};

				$scope.gotoLast = function() {
					$scope.pageNum = $scope.total_pages - 1; $scope.reload();
				};

				$scope.gotoPage = function(index) {
					$scope.pageNum = index; $scope.reload();
				}
			}			
			// Kết thúc phân trang