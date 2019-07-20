flApp.controller('practiceExerciseController', ['$scope', function($scope) {
	$scope.topic_id = parseInt(topic_id);
	$scope.sub_topic_id = parseInt(sub_topic_id);
	$scope.subject_id = parseInt(subject_id);
	$scope.exercise_number = parseInt(exercise_number);
	$scope.remaining = {
		minutes: 0,
		seconds: 10,
		total_seconds: 10,
		running: true
	};

	$scope.loadSubTopic = function() {
		var sub_topic = cacheStorage.getItem('sub_topic_' + $scope.sub_topic_id);
		if(null !== sub_topic) {
			$scope.sub_topic = sub_topic;
		} else {
			proxy_ajax({
				url: FL_API_URL + '/corecategories/' + $scope.sub_topic_id,
				type: 'get', dataType: 'json',
				success: function(resp) {
					cacheStorage.setItem('sub_topic_' + $scope.sub_topic_id, resp);
					$scope.sub_topic = resp;
					$scope.$apply();
				}
			});
		}
	};

	$scope.loadSubTopic();

}]);