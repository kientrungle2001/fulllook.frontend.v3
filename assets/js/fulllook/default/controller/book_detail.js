flApp.controller('bookDetailController', ['$scope', function ($scope) {
	$scope.userAnswers = {};
	$scope.arrquestionIds = [];
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/getDetailLesson', 
		data: {
			userId: sessionUserId,
			userBookId: userBookId				
		},
		dataType: 'json',
		success: function(resp) {			
			$scope.lessons = resp;
			var answers  =resp.ref_userbook_answers;
			answers.forEach( function(item) {				
				$scope.userAnswers[item.questionId]=item.answerId ;
			});	
			//console.log($scope.userAnswers);		
			var questions = resp.ref_userbook_answers;	
			questions.forEach( function(question) {
				$scope.arrquestionIds.push(question.questionId);
				//$scope.userAnswers['question.questionId'] = $scope.userAnswers['question.answerId'];
			});	
			$scope.loadQuestionAnswers($scope.arrquestionIds, $scope.userAnswers);								
			$scope.$apply();
		}
	});
	$scope.loadQuestionAnswers = function(questionIds, userAnswers){
		$scope.questions = [];
		$scope.trueAnswers = new Array();
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getQuestionAnswers', 
			data: {
				questionIds: questionIds			
			},
			dataType: 'json',
			success: function(resp) {			
				$scope.questions = resp;
				var questions = resp;
				questions.forEach( function(item) {
					var arrAnswers = item.ref_question_answers; 
					var trueAnswer =  arrAnswers.filter(function(answer) {
					  return answer.status === 1;
					})[0].id;
					$scope.trueAnswers[item.id]= trueAnswer;
				});												
				$scope.$apply();
			}
		});
	};
}]);