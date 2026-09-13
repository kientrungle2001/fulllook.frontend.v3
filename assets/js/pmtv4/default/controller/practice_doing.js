flApp.controller('practiceDoingController', ['$scope', function($scope) {
	$scope.topic_id = parseInt(topic_id);
	$scope.sub_topic_id = parseInt(sub_topic_id);
	$scope.subject_id = parseInt(subject_id);
	$scope.exercise_number = parseInt(exercise_number);
	$scope.remaining = {
		minutes: 15,
		seconds: 0,
		total_seconds: 15*60,
		running: true
	};

	$scope.loadSubTopic = function(callback) {
		var sub_topic = cacheStorage.getItem('sub_topic_' + $scope.sub_topic_id);
		if(null !== sub_topic) {
			$scope.sub_topic = sub_topic;
			callback();
		} else {
			proxy_ajax({
				url: FL_API_URL + '/corecategories/' + $scope.sub_topic_id,
				type: 'get', dataType: 'json',
				success: function(resp) {
					cacheStorage.setItem('sub_topic_' + $scope.sub_topic_id, resp);
					$scope.sub_topic = resp;
					$scope.$apply();
					callback();
				}
			});
		}
		
	};

	$scope.loadQuestions = function(callback) {
		var questions = cacheStorage.getItem('practice_questions_' + $scope.subject_id + '_' + $scope.sub_topic_id + '_' + $scope.exercise_number);
		if(null !== questions) {
			$scope.questions = questions;
			callback();
		} else {
			proxy_ajax({
				url: FL_API_URL + '/subject/getExerciseQuestions',
				type: 'post', dataType: 'json',
				data: {
					subject_id: $scope.subject_id,
					topic_id: $scope.sub_topic_id,
					exercise_number: $scope.exercise_number
				},
				success: function(resp) {
					cacheStorage.setItem('practice_questions_' + $scope.subject_id + '_' + $scope.sub_topic_id + '_' + $scope.exercise_number, resp);
					$scope.questions = resp;
					$scope.$apply();
					callback();
				}
			});
		}
	};

	$scope.countdown = function() {
		if($scope.remaining.running == false || $scope.remaining.total_seconds <= 0) {
			// stop
			$scope.finishPractice();
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

	var loaded = false;
	$scope.loadSubTopic(function() {
		if(($scope.sub_topic && $scope.sub_topic.trial == 1) || $scope.checkIsPaid()) {
			if(!loaded) {
				$scope.loadQuestions(function() {
					$scope.startTime = serverTime;
					$scope.countdown();
				});
				loaded = true;
			}
		}
	});
	$scope.user_answers = {};

	var finished = false;
	$scope.finishPractice = function() {
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
			//$scope.showAnswers();
			$scope.saveUserBook();
			jQuery('#resultModal').modal('show');
		}
	};

	$scope.saveUserBook = function() {
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
			subject_id: subject_id,
			topic_id: sub_topic_id,
			exercise_number: exercise_number,
			quantity_question: $scope.questions.length,
			mark: $scope.totalRights,
			duringTime: $scope.stopTime - $scope.startTime,
			startTime: $scope.startTime,
			stopTime: $scope.stopTime,
			lang: $scope.language,
			questions: questions
		};

		proxy_ajax({
			url: FL_API_URL + '/subject/updateUserBooks',
			type: 'post', dataType: 'json',
			data: postData,
			success: function(resp) {
				if(resp) {
					//$scope.showAnswers();
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

	$scope.read_question = function(id) {
		var url = 'http://s1.nextnobels.com/3rdparty/Filemanager/source/practice/all/'+id+'.mp3';
		window.read_question($('#sound-'+id)[0], url);
	};

}]);