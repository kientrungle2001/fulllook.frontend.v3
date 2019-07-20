<div id="menu">
	<div class="container">
		<ul type="pills" class="nav nav-pills">
			<li role="presentation" class="active">
				<a href="<?= base_url()?>index.php">
					Trang chủ
				</a>
			</li>
			<li role="presentation">
				<a href="<?= base_url()?>index.php/article/category?category_id=94">
					Giới thiệu
				</a>
			</li>
			<li role="presentation" class="dropdown">
				<a href="<?= base_url()?>index.php/article/category?category_id=80">
					Khóa học
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url()?>index.php/article/category?category_id=97">Luyện viết văn</a></li>
					<li><a href="<?= base_url()?>index.php/article/category?category_id=98">Luyện thi</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a href="<?= base_url()?>index.php/article/category?category_id=81">
					Quà tặng trí tuệ
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url()?>index.php/article/category?category_id=87">Cha mẹ suy ngẫm</a></li>
					<li><a href="<?= base_url()?>index.php/article/category?category_id=92">Ngôn ngữ trí tuệ</a></li>
					<li><a href="<?= base_url()?>index.php/article/category?category_id=93">Bài học cho con</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a href="<?= base_url()?>index.php/article/category?category_id=79">
					Bài viết chuyên đề
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url()?>index.php/article/category?category_id=102">Giải đáp các thắc mắc</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a href="<?= base_url()?>index.php/article/category?category_id=82">
					Thi@24h
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url()?>index.php/article/category?category_id=99">Thi thử vào Ams</a></li>
					<li><a href="<?= base_url()?>index.php/article/category?category_id=100">Đề thi và đáp án</a></li>
				</ul>
			</li>
			<li role="presentation">
				<a href="<?= base_url()?>index.php/article/category?category_id=104">
					Tin tức
				</a>
			</li>
		</ul>
	</div>
</div>
<style>
	.dropdown:hover .dropdown-menu {
		display: block;
		background: #333;
		margin-top: -5px;
	}
</style>