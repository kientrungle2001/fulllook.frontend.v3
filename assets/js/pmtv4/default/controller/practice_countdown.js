flApp.controller('practiceCountdownController', ['$scope', 'practice_remaining', function($scope, practice_remaining) {
	$scope.topic_id = parseInt(topic_id);
	$scope.sub_topic_id = parseInt(sub_topic_id);
	$scope.subject_id = parseInt(subject_id);
	$scope.exercise_number = parseInt(exercise_number);
	$scope.remaining = practice_remaining;

}]);