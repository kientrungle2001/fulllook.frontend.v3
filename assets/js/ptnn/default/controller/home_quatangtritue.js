ptnnApp.controller('home_quatangtritue_controller', [
	'$scope', function($scope) {
		$scope.title = 'Quà tặng trí tuệ';
		proxy_get({
			url: API_URL + '/api/content/get_articles',
			data: {
				catid: 81
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