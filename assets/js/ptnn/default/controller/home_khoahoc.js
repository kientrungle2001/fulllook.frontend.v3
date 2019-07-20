ptnnApp.controller('home_khoahoc_controller', [
	'$scope', function($scope) {
		$scope.title = 'Khóa học';
		proxy_get({
			url: API_URL + '/api/content/get_articles',
			data: {
				catid: 80
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