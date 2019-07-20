flApp.controller('practiceExerciseListController', ['$scope', function($scope) {
	$scope.exerciseNumsList = null;
	$scope.topic_id = topic_id;
	$scope.sub_topic_id = sub_topic_id;
	$scope.subject_id = subject_id;
	$scope.exercise_number = exercise_number;
	var practice_exercises = cacheStorage.getItem('practice_exercises_' + subject_id + '_' + sub_topic_id);
	if(null !== practice_exercises) {
		$scope.exerciseNumsList = practice_exercises;
	} else {
		proxy_ajax({
			type: 'post',
			url: FL_API_URL + '/subject/getExercises',
			dataType: 'json',
			data: {
				subject_id: subject_id,
				topic_id: sub_topic_id
			},
			success: function (resp) {
				var exerciseNumsList = [];
				for (var i = 0; i < resp; i++) {
					exerciseNumsList.push(i);
				}
				cacheStorage.setItem('practice_exercises_' + subject_id + '_' + sub_topic_id, exerciseNumsList);
				$scope.exerciseNumsList = exerciseNumsList;
				$scope.$apply();
			}
		});
	}
	
}]);