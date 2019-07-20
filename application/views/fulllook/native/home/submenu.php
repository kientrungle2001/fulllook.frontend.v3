<div class="full pb-4 pt-2 bg-cloud text-center">
	<a href="/news_list.php?id=1377" class="btn btn-warning">Tin tức</a>
	<a href="/news_list.php?id=147" class="btn btn-info">Hướng dẫn sử dụng</a>
	<a href="/about#guide" class="btn btn-danger">Hướng dẫn mua</a>
	<a href="/document.php" class="btn btn-primary">Kinh nghiệm ôn thi</a>
	<a href="/gift.php" class="btn btn-success">Giải trí</a>
	<?php if(isset($controller->session->userId)){ ?>
	<a href="/profile" class="btn btn-warning">Lịch sử học tập</a>
	<?php } else { ?>
		<button onclick="return alert('Đăng nhập để xem lịch sử');" class="btn btn-warning">Lịch sử học tập</button>
	<?php } ?>
</div>