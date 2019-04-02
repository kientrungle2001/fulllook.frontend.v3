<?php $controller->view('testset/testset', $data); ?>
<div class="do-practice full" style="text-align: center; padding-top: 50px;">
	<h2>{{translate(test, 'test.name')}}</h2>
	<p><strong>Dạng đề</strong>: {{test.trytest === 2 ? 'Tự luận': 'Trắc nghiệm'}}</p>
	<p><strong>Số lượng câu hỏi</strong>: {{test.quantity || 24}}</p>
	<p><strong>Thời gian làm bài</strong>: {{test.time || 45}} phút</p>
	<div ng-hide="checkIsLogedIn()">
		<h2 class="text-center">Bạn phải <a href="#" onclick="return false" data-toggle="modal"
				data-target="#loginRegisterModal">đăng nhập</a> mới có thể học bài</h2>
	</div>
	<div ng-show="checkIsLogedIn()">
		<div ng-hide="test.trial == 1 || checkIsPaid()">
		<h2 class="text-center">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được làm bài kiểm tra này</h2>
		</div>
		<div ng-show="test.trial == 1 || checkIsPaid()">
			<a href="/testSet/{{test.trytest==2 ? 'writting': 'doing'}}?category_id={{category_id}}&test_set_id={{test_set_id}}&test_id={{test_id}}" class="btn btn-primary btn-lg fa fa-play fa-3x text-white"> Bắt đầu làm</a>
		</div>
	</div>
	
</div>