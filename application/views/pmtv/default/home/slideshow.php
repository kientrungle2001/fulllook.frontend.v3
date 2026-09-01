<div id="homeslider" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div rel="#6dccfd" class="carousel-item relative active">
			<img class="d-block w-100" src="http://tdn.nextnobels.com/assets/images/banner/slider3.jpg" alt="First slide">
			<?php if(0): ?>
			<div class="absolute language d-none d-sm-block">
				<div class="d-flex bd-highlight">

					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('en');">Tiếng
						Anh<br><img src="http://tdn.nextnobels.com/assets/images/en.png"> </span>
					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('vn')">Tiếng
						Việt<br><img src="http://tdn.nextnobels.com/assets/images/vn.png"></span>
					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('ev')">Song ngữ
						<br><img src="http://tdn.nextnobels.com/assets/images/ev.png"> </span>
				</div>

			</div>
			<div class="absolute language-xs d-block d-sm-none">
				<div class="d-flex bd-highlight">

					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage();">Tiếng
						Anh<br><img src="http://tdn.nextnobels.com/assets/images/en.png"> </span>
					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('vn')">Tiếng
						Việt<br><img src="http://tdn.nextnobels.com/assets/images/vn.png"></span>
					<span class="p-2 flex-fill bd-highlight text-center" ng-click="clickLanguage('ev')">Song ngữ
						<br><img src="http://tdn.nextnobels.com/assets/images/ev.png"> </span>
				</div>

			</div>
			
			<div class="absolute timhieu d-none d-sm-block"><a class="btn btn-warning" href="/about">Tìm hiểu
					ngay</a>
			</div>
			<div class="absolute timhieu2 d-block d-sm-none"><a class="btn-xs btn-warning" href="/about">Tìm
					hiểu ngay</a>
			</div>
			<?php endif?>
		</div>
		<div rel="#fcb7d5" class="carousel-item">
			<img class="d-block w-100" src="http://tdn.nextnobels.com/assets/images/banner/slider2.jpg" alt="Second slide">
			<div class="absolute btdk d-none d-sm-block"><a class="btn btn-warning" href="/about#guide">Đăng kí
					ngay</a>
			</div>
			<div class="absolute btdk2 d-block d-sm-none"><a class="btn-xs btn-warning" href="/about#guide">Đăng
					kí ngay</a>
			</div>
		</div>
		<div rel="#7bc646" class="carousel-item">
			<img class="d-block w-100" src="http://tdn.nextnobels.com/assets/images/banner/slider1.jpg" alt="Third slide">
		</div>
		<?php if(0): ?>
		<div rel="#73bee9" class="carousel-item relative">
			<img class="d-block w-100" src="http://tdn.nextnobels.com/assets/images/slider2.png" alt="Four slide">

			<div class="absolute btmn d-none d-sm-block"><a class="btn btn-danger" href="/about#guide">Mua
					ngay</a>
			</div>
			<div class="absolute btmn2 d-block d-sm-none"><a class="btn-xs btn-danger" href="/about#guide">Mua
					ngay</a>
			</div>
		</div>
		<?php endif?>
		<a class="carousel-control-prev" href="#homeslider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#homeslider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>