<!-- Modal -->
<div id="loginRegisterModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Đăng nhập - Đăng ký</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-4">
						<h2>Đăng nhập</h2>
						<div class="panel panel-body">
							<form class="form-signin form">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Tên đăng nhập"
										ng-model="login.username" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Mật khẩu"
										ng-model="login.password" required>
								</div>

								<div class="form-group alert "
									ng-class="{'alert-danger': login.success==0, 'alert-success': login.success==1}"
									ng-show="login.message" ng-bind-html="login.message">

								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block btn-signin"
										ng-click="doLogin('//<?php echo $_SERVER['HTTP_HOST']?>')">Đăng nhập</button>
								</div>
								<div class="form-group">
									<a href="https://tdn.nextnobels.com/login_facebook.php"
										class="btn btn-block btn-primary">
										<i class="fa fa-facebook mr-2"></i> Đăng nhập bằng Facebook
									</a>
								</div>
							</form><!-- /form -->
							<a href="" class="forgot-password">
								Quên mật khẩu?
							</a>
						</div><!-- /card-container -->


					</div>
					<div class="col-lg-8">
						<h2>Đăng kí</h2>
						<div class="panel panel-body">
							<form class="form-signin form">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Tên đăng nhập"
												ng-model="register.username" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Họ và tên"
												ng-model="register.name" required autofocus>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Mật khẩu"
												ng-model="register.password" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control"
												placeholder="Nhập lại Mật khẩu" ng-model="register.repassword"
												required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email"
												ng-model="register.email" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Số điện thoại"
												ng-model="register.phone" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="date" class="form-control" ng-model="register.birthday" required
										placeholder="Ngày sinh">
								</div>
								<div class="row">
									<div class="col-md-6" ng-init="register.sex='1'">
										<div class="form-group">
											<select ng-model="register.sex" required class="form-control">
												<option value="1" selected>Nam</option>
												<option value="0">Nữ</option>
											</select>
										</div>
									</div>
									<div class="col-md-6" ng-init="register.areacode='2'">
										<select ng-model="register.areacode" class="form-control"
											placeholder="tỉnh thành" required>
											<option ng-repeat="areaCode in areaCodes " value="{{areaCode.id}}">
												{{areaCode.name}}</option>

										</select>
									</div>
								</div>
								<div class="form-group alert"
									ng-class="{'alert-danger': 	register.success==0, 'alert-success': register.success==1}"
									ng-show="register.message" ng-bind-html="register.message">

								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block btn-signin"
										ng-click="doRegister('//<?php echo $_SERVER['HTTP_HOST']?>')">Đăng kí</button>
								</div>
								<div class="form-group">
									Bằng việc đăng kí, bạn đã đồng ý với điều khoản sử dụng và chính sách
									bảo mật của Next Nobels
								</div>

							</form><!-- /form -->
						</div><!-- /card-container -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>