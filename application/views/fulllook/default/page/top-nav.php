<nav id="topNav" class="navbar p-3 fixed-to navbar-expand-md ">
	<a class="navbar-brand mx-auto" href="/">
		<img src="http://tdn.nextnobels.com/assets/images/logo.png" /></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
		<i class="fa fa-bars text-white" aria-hidden="true"></i>
	</button>
	<div class="container">
		<div class="navbar-collapse collapse">
			<ul class="navbar-nav menu-top1">
				<li class="nav-item">
					<img src="http://tdn.nextnobels.com/assets/images/hotline.png" /> Hotline: 0936 738 986
				</li>
				<li class="nav-item">
					&nbsp;
					<select ng-model="language" ng-change="changeLanguage()">
						<option value="" ng-selected="language==''" disabled="disabled">{{translate('Select language')}}
						</option>
						<option value="en" ng-selected="language=='en'">English</option>
						<option value="vn" ng-selected="language=='vn'">Tiếng Việt</option>
						<option value="ev" ng-selected="language=='ev'">Song ngữ</option>
					</select>
				</li>
			</ul>
			<ul class="navbar-nav menu-top2 ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="/about#guide"><img
							src="http://tdn.nextnobels.com/assets/images/cart.png" /> Mua ngay</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/about#paycardfl"><img
							src="http://tdn.nextnobels.com/assets/images/pay.png" /> Nạp thẻ</a>
				</li>
				<?php if(!isset($controller->session->userId)) :?>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#loginRegisterModal"><img
							src="http://tdn.nextnobels.com/assets/images/dn.png" /> Đăng nhập</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#loginRegisterModal"><img
							src="http://tdn.nextnobels.com/assets/images/dk.png" /> Đăng kí</a>
				</li>
				<?php else: ?>
				<li class="nav-item dropdown">
					<span class="navbar-text">Xin chào </span> <a class="btn btn-primary text-white dropdown-toggle"
						data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false"><?php echo $controller->session->name ?></span> </a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="/profile" class="dropdown-item">Trang cá nhân</a>
						<a href="/profile#luyentap" class="dropdown-item">Lịch sử học tập</a>
						<div class="dropdown-divider"></div>
						<a href="/home/logout" class="dropdown-item">Đăng xuất</a>
					</div>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</div>

</nav>