<?php $controller->view('practice/topic', $data);?>
<?php $controller->js('controller/practice_doing.js')?>

<div ng-controller="practiceDoingController">

	<div class="do-practice full" ng-hide="sub_topic.trial == 1 || checkIsPaid()">
		<h2 class="text-center guide">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được xem bài học này</h2>
	</div>
	<h1 class="text-center">Bài {{exercise_number}}</h1>
	
	<div ng-show="sub_topic.trial == 1 || checkIsPaid()">
		<?php $controller->view('practice/countdown', $data)?>
	</div>
</div>