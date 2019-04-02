<div class="full pb-4 pt-2 bg-cloud text-center">
	<a href="/news_list.php?id=1377" class="btn btn-warning btn-xs">Tin tức</a>
	<a href="/news_list.php?id=147" class="btn btn-info btn-xs">HD sử dụng</a>
	<a href="/about#guide" class="btn btn-danger btn-xs">HD mua</a>
	<a href="/document.php" class="btn btn-primary btn-xs">KN ôn thi</a>
	<a href="/gift.php" class="btn btn-success btn-xs">Giải trí</a>
	<?php if(isset($_SESSION['userId'])){ ?>
	<a href="/profile" class="btn btn-warning btn-xs">LS học tập</a>
	<?php } else { ?>
		<button onclick="return alert('Đăng nhập để xem lịch sử');" class="btn btn-warning btn-xs">Lịch sử học tập</button>
	<?php } ?>
</div>