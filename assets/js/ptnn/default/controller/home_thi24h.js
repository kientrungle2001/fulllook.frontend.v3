ptnnApp.controller('home_thi24h_controller', [
	'$scope', function($scope) {
		$scope.title = 'Thi@24h';
		proxy_get({
			url: API_URL + '/api/content/get_articles',
			data: {
				catid: 82
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