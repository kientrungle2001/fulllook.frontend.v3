ptnnApp.controller('article_detail_controller', [
	'$scope', function($scope) {
		proxy_get({
			url: API_URL + '/api/content/article',
			data: {
				article_id: article_id
			},
			success: function(resp) {
				$scope.article = resp;
				$scope.$apply();
			}
		});
	}
]);