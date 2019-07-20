ptnnApp.controller('category_list_controller', [
	'$scope', function($scope) {
		$scope.title = 'Bài viết chuyên đề';
		var articles = cacheStorage.getItem('category_articles_' + category_id);
		if(null !== articles) {
			$scope.articles = articles;
		} else {
			proxy_get({
				url: API_URL + '/api/content/get_articles',
				data: {
					catid: category_id,
					pageSize: 1000
				},
				success: function(resp) {
					$scope.articles = resp;
					$scope.articles.forEach(function(article) {
						article.image = $scope.getImage(article.introtext);
					});
					cacheStorage.setItem('category_articles_' + category_id, angular.copy($scope.articles));
					$scope.$apply();
				}
			});
		}

		$scope.articles_loop = function () {
			var kq = [];
			for(var i = 4; i < $scope.articles.length - 4; i++) {
				kq.push(i);
			}
			return kq;
		}
	}
]);