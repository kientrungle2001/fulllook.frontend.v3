flApp.controller('newsIndexController', ['$scope', function($scope) {
  // init
  $scope.news_category_id = parseInt(news_category_id);
  // declaration
  $scope.loadCategory = function() {
    proxy_ajax({
      url: FL_API_URL + '/corecategories/' + $scope.news_category_id,
      type: 'get', dataType: 'json',
      success: function(resp) {
        $scope.category = resp;
        $scope.$apply();
      }
    });
  };
  $scope.loadNews = function() {
    proxy_ajax({
			url: FL_API_URL +'/news/getNews',
      type: 'post', dataType: 'json',
			data: {categoryId: $scope.news_category_id}, 
			success: function(resp) {
				$scope.newsLists = resp;
				$scope.$apply();
			}
		});
  }

  // running
  $scope.loadNews();
  $scope.loadCategory();
}]);