<?php 
$items = [
	['link' => '/', 'label' => 'Trang tổng quan'],
	['link' => '/home/test_schedule', 'label' => 'Thi test đầu vào', 'children' => [
		['link' => '/', 'label' => 'Danh sách thi đầu vào'],
		['link' => '/', 'label' => 'Kết quả thi đầu vào'],
	]],
	['link' => '/home/student', 'label' => 'Học sinh', 'children' => [
		['link' => '/', 'label' => 'Danh sách học sinh'],
		['link' => '/', 'label' => 'Danh sách chờ'],
		['link' => '/', 'label' => 'Danh sách học sinh theo khóa học'],
		['link' => '/', 'label' => 'Danh sách học sinh theo người phụ trách'],
	]],
	['link' => '/home/teacher', 'label' => 'Giáo viên'],
	['link' => '/home/classes_outside', 'label' => 'Lớp ngoài'],
	['link' => '/home/student_fee', 'label' => 'Học phí'],
	['link' => '/home/order', 'label' => 'Thu chi'],
];
?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/">QLHS v3</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<?php foreach($items as $item):?>
				<?php if(!isset($item['children'])):?>
				<li class="nav-item">
					<a class="nav-link" href="<?= $item['link']?>"><?= $item['label']?></a>
				</li>
				<?php else: ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="<?= $item['link']?>" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $item['label']?>
					</a>
					<div class="dropdown-menu" aria-labelledby="<?= $item['label']?>">
						<?php foreach($item['children'] as $childItem):?>
						<a class="dropdown-item" href="<?= $childItem['link']?>"><?= $childItem['label']?></a>
						<?php endforeach?>
					</div>
				</li>
				<?php endif?>
				<?php endforeach?>
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						admin
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Hồ sơ</a>
						<a class="dropdown-item" href="#">Đổi mật khẩu</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Đăng xuất</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>