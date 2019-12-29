<div class="container" ng-controller="nhan_vien_dang_nhap_controller">
    <div class="card card-login mx-auto col-md-12 md-offset-6 text-center">
        <div class="card-header mx-auto">
            <span class="logo_title mt-5"> Đăng nhập </span>
        </div>
        <div class="card-body">
            <form action="" method="post" onsubmit="return false;">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" ng-model="ten_dang_nhap" class="form-control" placeholder="Tên đăng nhập">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" ng-model="mat_khau" class="form-control" placeholder="Mật khẩu">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Đăng nhập" 
                    ng-click="dang_nhap()"
                    class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>
</div>

<script>
anphatApp.controller('nhan_vien_dang_nhap_controller', ['$scope', function($scope) {
    $scope.dang_nhap = function() {
        $.ajax({
            url: 'http://laramongo.vn/api/v1/dang_nhap',
            type: 'post', dataType: 'json',
            data: {
                ten_bang: 'nhan_vien',
                ten_dang_nhap: $scope.ten_dang_nhap,
                mat_khau: $scope.mat_khau
            },
            success: function(ket_qua) {
                ìf(ket_qua.trang_thai) {
                    localStorage.setItem('ma_token', ket_qua.token);
                    localStorage.setItem('ten_nhan_vien', ket_qua.ten_nhan_vien);
                    localStorage.setItem('ten_dang_nhap', ket_qua.ten_dang_nhap);
                } else {
                }
                alert(ket_qua.thong_bao);
            }
        })
    };
}]);
</script>