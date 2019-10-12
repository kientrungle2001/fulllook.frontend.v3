flApp.controller('newsDetailController', ['$scope', function($scope) {
  // init
  $scope.news_id = parseInt(news_id);
  // declaration
  $scope.getNews = function(newId){
		proxy_ajax({
			url: FL_API_URL +'/cmsnews/'+newId,
			success: function(resp) {
				$scope.news = resp;
				proxy_ajax({
					url: FL_API_URL +'/corecategories/'+resp.categoryId,
					success: function(resp){
						$scope.category = resp;
						proxy_ajax({
							url: FL_API_URL +'/news/getNews',
							type: 'post',
							data: {categoryId: resp.id}, 
							success: function(resp) {
								$scope.newsRelates = resp;
								$scope.$apply();
							}
						});
						$scope.$apply();
					}
				});
				
				$scope.$apply();
			}
		});
		
	};

  // running
  $scope.getNews($scope.news_id);
}]);