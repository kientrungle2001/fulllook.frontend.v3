<nav id="topNav" class="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topNavMenu"
				aria-expanded="false">
				<i class="fa fa-bars text-white" aria-hidden="true"></i>
			</button>
			<a class="navbar-brand" href="/">
				<img src="http://tdn.nextnobels.com/assets/images/logo.png" /></a>
		</div>

		<div class="navbar-collapse collapse" id="topNavMenu">
			<ul class="nav navbar-nav menu-top1">
				<li class="nav-item">
					<div class="navbar-text">
						<img src="http://tdn.nextnobels.com/assets/images/hotline.png" /> Hotline: 0936 738 986
					</div>
				</li>
				<li class="nav-item">
					<div class="navbar-text">
						&nbsp;
						<select ng-model="language" ng-change="changeLanguage()">
							<option value="" ng-selected="language==''" disabled="disabled">
								{{translate('Select language')}}
							</option>
							<option value="en" ng-selected="language=='en'">English</option>
							<option value="vn" ng-selected="language=='vn'">Tiếng Việt</option>
							<option value="ev" ng-selected="language=='ev'">Song ngữ</option>
						</select>
					</div>
				</li>
			</ul>
			<ul class="nav navbar-nav menu-top2 navbar-right">
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
				<li class="nav-item">
					<div class="navbar-form">
						<div class="dropdown">
							Xin chào
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $controller->session->name ?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="/profile" class="dropdown-item">Trang cá nhân</a></li>
								<li><a href="/profile#luyentap" class="dropdown-item">Lịch sử học tập</a></li>
								<li><a href="/home/logout" class="dropdown-item">Đăng xuất</a></li>
							</ul>
						</div>
					</div>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</div>

</nav>