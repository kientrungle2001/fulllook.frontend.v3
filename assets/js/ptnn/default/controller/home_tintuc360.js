ptnnApp.controller('home_tintuc360_controller', [
	'$scope', function($scope) {
		$scope.title = 'Tin tức 360';
		var articles = cacheStorage.getItem('home_category_articles_104');
		if(null !== articles) {
			$scope.articles = articles;
		} else {
			proxy_get({
				url: API_URL + '/api/content/get_articles',
				data: {
					catid: 104
				},
				success: function(resp) {
					$scope.articles = resp;
					$scope.articles.forEach(function(article) {
						article.image = $scope.getImage(article.introtext);
					});
					cacheStorage.setItem('home_category_articles_104', angular.copy($scope.articles));
					$scope.$apply();
				}
			});
		}
		
	}
]);