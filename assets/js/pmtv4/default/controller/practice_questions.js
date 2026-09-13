flApp.controller('practiceQuestionsController', ['$scope', function($scope) {
	$scope.isFinished = function() {
		return false === $scope.remaining.running;
	};
}]);