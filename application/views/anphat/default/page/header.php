<?php 
$items = [
	['link' => '/admin/test', 'label' => 'Đề thi'],
	['link' => '/admin/category', 'label' => 'Danh mục'],
	['link' => '/admin/question', 'label' => 'Câu hỏi'],
	['link' => '/admin/document', 'label' => 'Tài liệu'],
	['link' => '/admin/user', 'label' => 'Người dùng'],
	['link' => '/admin/news', 'label' => 'Tin tức'],
	['link' => '/admin/config', 'label' => 'Cấu hình'],
];
?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
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
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Đăng xuất</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>