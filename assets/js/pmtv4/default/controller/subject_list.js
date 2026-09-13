flApp.controller('subjectListController', ['$scope', function($scope) {
	$scope.subjects = [];
	var subjects = cacheStorage.getItem('all_subjects');
	if(null !== subjects) {
		$scope.subjects = subjects;
	} else {
		proxy_ajax({
			url: FL_API_URL +'/corecategories',
			data: {
				where: {
					parent: 47,
					software: 1,
					// site: [0, 1],
					status: 1,
					display: 1,
					classes: {like: '%,5,%'}
					// displayAtSite: [0, 1]
				},
				select: 'id,name,name_vn,img,level',
				sort: 'ordering asc'
			},
			type: 'get', dataType: 'json', 
			success: function(resp) {
				cacheStorage.setItem('all_subjects', resp);
				$scope.subjects = resp;
				$scope.$apply();
			}
		});
	}
	
}]);