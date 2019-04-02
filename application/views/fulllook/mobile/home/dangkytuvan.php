<div class="full bg4">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h3 id="dangkydungthu" class="heading text-uppercase text-center mb-3 text-white">đăng ký dùng thử</h3>
				
				<form method="post">
					<div class="form-group mb-4">
					    <input type="text" ng-model="advice.name" class="form-control input" placeholder="Họ tên" required>
					    
					</div>
					<div class="form-group mb-4">
					    <input type="text" ng-model="advice.phone" class="form-control input" placeholder="Số điện thoại" required>					    
					</div>
					<div class="form-group mb-4">
					    <input type="email" ng-model="advice.email" class="form-control input" placeholder="Email" required>
					    
					</div>
					<div class="form-group alert" ng-class="{'alert-danger': advice.success == 0, 'alert-success': advice.success== 1}" ng-show="advice.success" ng-bind-html="advice.message">
						
					</div>
					<div class="form-group text-center">						
						<input type="submit" class="btn dangki" ng-click="registerForAdvice()" value="ĐĂNG KÝ">
						
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-md-6">
				<h3 class="heading text-uppercase mb-3 text-center text-white">Học phí</h3>
				<div class="box-hocphi full text-center">
					<div class="hocphi full">
						Học và ôn thi bằng tiếng Việt,<br>  
						tiếng anh và song ngữ  <br> 
						Chỉ <span class="fs29">700.000</span> VNĐ <br> 
						CHO<span class="fs29">1 năm</span> sử dụng<br> 
					</div>
					
					<a href="/about#guide" class="buynow full">
						Mua ngay
					</a>
				</div>
			</div>
		</div>
	</div>
</div>