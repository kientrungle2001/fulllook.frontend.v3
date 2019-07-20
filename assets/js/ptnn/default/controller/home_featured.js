ptnnApp.controller('home_featured_controller', [
	'$scope', function($scope) {
		$scope.title = 'Bài viết chuyên đề';
		proxy_get({
			url: API_URL + '/api/content/get_articles',
			data: {
				catid: 79
			},
			success: function(resp) {
				$scope.articles = resp;
				$scope.articles.forEach(function(article) {
					article.image = $scope.getImage(article.introtext);
				});
				$scope.$apply();
			}
		});
	}
]);