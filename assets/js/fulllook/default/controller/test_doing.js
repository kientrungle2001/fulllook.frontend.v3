flApp.controller('testDoingController', ['$scope', function($scope) {
	
	$scope.category_id = parseInt(category_id);
	$scope.test_id = parseInt(test_id);

	$scope.remaining = {
		minutes: 0,
		seconds: 0,
		total_seconds: 0,
		running: true
	};

	$scope.user_answers = {};

	$scope.loadQuestions = function(callback) {
		if($scope.test_id) {
			var questionAnswers = cacheStorage.getItem('question_answers_' + $scope.test_id);
			if (null !== questionAnswers) {
				$scope.questions = questionAnswers;
				callback();
			} else {
				jQuery.ajax({
					url: FL_API_URL + '/test/getQuestionsAnswers',
					data: {test_id: $scope.test_id},
					type: 'post', dataType: 'json', success: function(questions) {
						cacheStorage.setItem('question_answers_' + $scope.test_id, questions);
						$scope.questions = questions;
						$scope.$apply();
						callback();
					}
				});
			}
		}
	};
	$scope.countdown = function() {
		if($scope.remaining.running == false || $scope.remaining.total_seconds <= 0) {
			// stop
			$scope.finishTest();
			$scope.$apply();
		} else {
			setTimeout(function(){
				$scope.remaining.total_seconds--;
				$scope.remaining.seconds = $scope.remaining.total_seconds % 60;
				$scope.remaining.minutes = parseInt($scope.remaining.total_seconds / 60);
				$scope.$apply();
				$scope.countdown();
			}, 1000);
		}
	};
	var testLoaded = false;
	$scope.$watch('test', function() {
		if($scope.test) {
			if(!testLoaded) {
				$scope.remaining.minutes = parseInt($scope.test.time);
				$scope.remaining.total_seconds = $scope.remaining.minutes * 60;
				$scope.loadQuestions(function() {
					$scope.startTime = serverTime;
					$scope.countdown();
				});
				testLoaded = true;
			}
		}
	});

	var finished = false;
	$scope.finishTest = function() {
		if(!finished) {
			finished = true;
			$scope.remaining.running = false;
			$scope.stopTime = serverTime;
			$scope.totalRights = 0;
			for(var questionId in $scope.user_answers) {
				if($scope.isRightAnswer(questionId)) {
					$scope.totalRights++;
				}
			}
			$scope.totalWrongs = $scope.questions.length - $scope.totalRights;
			$scope.showAnswers();
			$scope.saveUserBook();
			jQuery('#resultModal').modal('show');
		}
	};

	$scope.saveUserBook = function() {
		// $scope.$apply();
		// test/updateUserBooks
		var questions = [];
		for(var i = 0; i < $scope.questions.length; i++) {
			if(typeof $scope.user_answers[$scope.questions[i].id] == 'undefined') {
				questions.push({
					questionId: $scope.questions[i].id,
					answerId: 0,
					status: 0
				});
			} else {
				questions.push({
					questionId: $scope.questions[i].id,
					answerId: $scope.user_answers[$scope.questions[i].id],
					status: $scope.isRightAnswer($scope.questions[i].id) ? 1 : 0
				});
			}
		}
		var postData = {
			userId: sessionUserId,
			categoryId: $scope.category_id,
			topic_id: 0,
			exercise_number: 0,
			testId: $scope.test_id,
			parentTest: 0,
			quantity_question: $scope.questions.length,
			mark: $scope.totalRights,
			duringTime: $scope.stopTime - $scope.startTime,
			startTime: $scope.startTime,
			stopTime: $scope.stopTime,
			lang: $scope.language,
			questions: questions
		};

		jQuery.ajax({
			url: FL_API_URL + '/test/updateUserBooks',
			type: 'post', dataType: 'json',
			data: postData,
			success: function(resp) {
				if(resp) {
					$scope.showAnswers();
					$scope.$apply();
				}
			}
		});
	};

	$scope.showAnswers = function() {
		$scope.showAnswer = true;
	};

	$scope.isRightAnswer = function(questionId) {
		if(typeof $scope.user_answers[questionId] == 'undefined') {
			return false;
		}
		var answerId = $scope.user_answers[questionId];
		for(var i = 0; i < $scope.questions.length; i++) {
			var question = $scope.questions[i];
			for(var j = 0; j < question.ref_question_answers.length; j++) {
				var answer = question.ref_question_answers[j];
				if(answer.id == answerId && answer.status == 1) {
					return true;
				}
			}
		}
		return false;
	};

	$scope.getExplaination = function(question) {
		var explaination = null;
		question.ref_question_answers.forEach(function (answer) {
			if (answer.status == 1 || answer.status == '1') {
				explaination = answer.recommend;
			}
		});
		if (!explaination || explaination == '') {
			explaination = question.explaination;
		}
		return explaination;
	};
	
}]);