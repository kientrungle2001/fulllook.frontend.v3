<?php 
$items = [
	
	['link' => '/cong_ty/danh_sach', 'label' => 'Công ty'],
	['link' => '/thong_tin_lien_he/danh_sach', 'label' => 'Thông tin liên hệ'],
	['link' => '/thong_tin_han/danh_sach', 'label' => 'Thông tin hạn'],
	['link' => '#', 'label' => 'Quản trị', 'children' => [
		['link' => '/dia_diem', 'label' => 'Địa điểm'],
	]],
	['link' => '#', 'label' => 'Nhân sự', 'children' => [
		['link' => '/chuc_vu', 'label' => 'Chức vụ'],
		['link' => '/nhan_vien', 'label' => 'Nhân viên'],
		['link' => '/phong_ban', 'label' => 'Phòng ban'],
	]],
	['link' => '#', 'label' => 'Dịch vụ', 'children' => [
		['link' => '/loai_dich_vu', 'label' => 'Loại dịch vụ'],
		['link' => '/dich_vu', 'label' => 'Dịch vụ'],
		['link' => '/loai_chinh_sach', 'label' => 'Loại chính sách'],
		['link' => '/chinh_sach_dich_vu', 'label' => 'Chính sách dịch vụ'],
		['link' => '/nha_cung_cap', 'label' => 'Nhà cung cấp'],
		['link' => '/loai_danh_sach', 'label' => 'Loại danh sách'],
		['link' => '/danh_sach_khai_thac', 'label' => 'Danh sách khai thác'],
		['link' => '/co_quan_thue', 'label' => 'Cơ quan thuế'],
		
	]],
	['link' => '#', 'label' => 'Tổng quát', 'children' => [
		['link' => '/thuc_don', 'label' => 'Thực đơn'],
		['link' => '/luoc_do', 'label' => 'Lược đồ'],
		['link' => '/loai_thuoc_tinh', 'label' => 'Loại thuộc tính'],
		['link' => '/loai_thuoc_tinh_tham_so', 'label' => 'Tham số của Loại thuộc tính'],
		['link' => '/bo_thuoc_tinh', 'label' => 'Bộ thuộc tính'],
		['link' => '/bo_thuoc_tinh_danh_sach', 'label' => 'Bộ thuộc tính danh sách'],
		['link' => '/thuoc_tinh', 'label' => 'Thuộc tính'],
	]],
];
?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">CRM</a>
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
						<ul class="nav">
						<?php foreach($item['children'] as $childItem):?>
						<?php if(!isset($childItem['children'])):?>
						<li class="nav-item"><a class="dropdown-item" href="<?= $childItem['link']?>"><?= $childItem['label']?></a></li>
						<?php else:?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?= $childItem['link']?>" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $childItem['label']?>
							</a>
							<div class="dropdown-menu" aria-labelledby="<?= $childItem['label']?>">
							<ul class="nav">
							<?php foreach($childItem['children'] as $subChildItem):?>
							<li class="nav-item"><a class="dropdown-item" href="<?= $subChildItem['link']?>"><?= $subChildItem['label']?></a></li>
							<?php endforeach;?>
							</ul>
							</div>
						</li>
						<?php endif; ?>
						<?php endforeach?>
						</ul>
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