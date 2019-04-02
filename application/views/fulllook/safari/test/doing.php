<?php $controller->js('controller/test_doing.js'); ?>
<div ng-controller="testDoingController">
	<div class="do-practice full" ng-hide="test.trial == 1 || checkIsPaid()">
		<h2 class="text-center guide">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được làm bài kiểm tra này</h2>
	</div>
	
	<div ng-show="test.trial == 1 || checkIsPaid()">
		<?php $controller->view('test/countdown', $data)?>
	</div>
</div>