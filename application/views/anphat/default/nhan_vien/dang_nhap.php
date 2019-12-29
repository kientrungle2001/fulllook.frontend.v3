<div class="container" ng-controller="nhan_vien_dang_nhap_controller">
    <div class="card card-login mx-auto col-md-12 md-offset-6 text-center">
        <div class="card-header mx-auto">
            <span class="logo_title mt-5"> Đăng nhập </span>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" name="email" class="form-control" placeholder="Username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>
</div>

<script>
anphatApp.controller('nhan_vien_dang_nhap_controller', ['$scope', function($scope) {
    $scope.dang_nhap = function() {

    };
}]);
</script>