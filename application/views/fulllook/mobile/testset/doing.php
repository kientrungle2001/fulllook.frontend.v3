<?php $controller->view('testset/testset', $data); ?>
<div class="do-practice" style="text-align: center; padding-top: 50px;">
	<h2>{{translate(test, 'test.name')}}</h2>
	<p><strong>Dạng đề</strong>: {{test.trytest === 2 ? 'Tự luận': 'Trắc nghiệm'}}</p>
	<p><strong>Số lượng câu hỏi</strong>: {{test.quantity || 24}}</p>
	<p><strong>Thời gian làm bài</strong>: {{test.time || 45}} phút</p>
</div>

<?php $controller->js('controller/test_set_doing.js'); ?>
<div ng-controller="testSetDoingController">
	<div class="do-practice" ng-hide="test.trial == 1 || checkIsPaid()">
		<h2 class="text-center guide">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được làm bài kiểm tra này</h2>
	</div>
	
	<div ng-show="test.trial == 1 || checkIsPaid()">
		<?php $controller->view('testset/countdown', $data)?>
	</div>
</div>