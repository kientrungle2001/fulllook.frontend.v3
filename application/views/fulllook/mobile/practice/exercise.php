<?php $controller->view('practice/topic', $data);?>
<?php $controller->js('controller/practice_exercise.js')?>
<div ng-controller="practiceExerciseController">
	
	<div class="do-practice full" ng-hide="sub_topic.trial == 1 || checkIsPaid()">
		<h2 class="text-center guide">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được xem bài học này</h2>
	</div>
	<h1 class="text-center">Bài {{exercise_number}}</h1>
	<div class="text-center mt-5" ng-show="sub_topic.trial == 1 || checkIsPaid()">
		<a class="btn btn-primary fa fa-play fa-3x" 
		href="/practice/doing?subject_id={{subject_id}}&topic_id={{topic_id}}&sub_topic_id={{sub_topic_id}}&exercise_number={{exercise_number}}"> Bắt đầu làm bài</a>
	</div>
</div>