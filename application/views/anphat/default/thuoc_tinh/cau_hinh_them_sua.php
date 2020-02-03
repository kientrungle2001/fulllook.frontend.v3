<h1 class="text-center"><?= $ten_thuoc_tinh ?> - <?= $ma_thuoc_tinh ?></h1>
<form ng-controller="thuoc_tinh_them_sua_controller">
<?php
foreach($loai_thuoc_tinh_them_sua['tham_so'] as $tham_so) {
    $controller->view('truong/' . $tham_so['tham_so_loai_truong_them_sua'], [
        'kich_co' => 6,
        'model' => 'thuoc_tinh_them_sua.'.$tham_so['ma_loai_thuoc_tinh_tham_so'],
        'tieu_de' => $tham_so['ten_loai_thuoc_tinh_tham_so'],
        'kieu_du_lieu' => $tham_so['tham_so_kieu_du_lieu']
    ]);
}
?>
<button class="btn btn-primary" ng-click="cap_nhat_ban_ghi_cua_bang('<?= $_id['$oid']?>', 'thuoc_tinh', {'cau_hinh_them_sua': thuoc_tinh_them_sua}, chuyen_trang('/thuoc_tinh'))">Luu</button>
</form>
<?php 
$cau_hinh_them_sua_mac_dinh = [
    'model' => $ma_thuoc_tinh,
    'tieu_de' => $ten_thuoc_tinh,
    'loai_truong_them_sua' => $loai_thuoc_tinh_them_sua['ma_loai_thuoc_tinh'],
    'kieu_du_lieu' => 'text'
];
?>
<script>
anphatApp.controller('thuoc_tinh_them_sua_controller', ['$scope', 'sua_ban_ghi', function($scope, sua_ban_ghi) {
  $scope.ten_bang = 'thuoc_tinh';
  $scope.sua_ban_ghi = function(ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    var id = ban_ghi_params._id.$oid;
    delete ban_ghi_params._id;
    sua_ban_ghi(
      id,
      {ten_bang: $scope.ten_bang, du_lieu: ban_ghi_params}, function(resp) {
      if(callback) return callback(resp);
    });
  };

  $scope.sua_ban_ghi_cua_bang = function(ten_bang, ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    var id = ban_ghi_params._id.$oid;
    delete ban_ghi_params._id;
    sua_ban_ghi(
      id,
      {ten_bang: ten_bang, du_lieu: ban_ghi_params}, function(resp) {
      if(callback) return callback(resp);
    });
  };

  $scope.cap_nhat_ban_ghi_cua_bang = function(id, ten_bang, ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    delete ban_ghi_params._id;
    sua_ban_ghi(
      id,
      {ten_bang: ten_bang, du_lieu: ban_ghi_params}, function(resp) {
      if(callback) return callback(resp);
    });
  };
  $scope.chuyen_trang = function(url) {
    return function() {
      var quay_lai = new URL(location.href).searchParams.get('quay_lai');
      if(quay_lai) {
        window.location = quay_lai;
      } else {
        window.location = url;
      }
    };
  };

  $scope.thuoc_tinh_them_sua = <?= isset($cau_hinh_them_sua)? json_encode($cau_hinh_them_sua): json_encode($cau_hinh_them_sua_mac_dinh)?>;
}]);
</script>

<?php
/*
Array
(
    [_id] => Array
        (
            [$oid] => 5dc30e5442deb6392142f124
        )

    [trang_thai] => 1
    [ten_thuoc_tinh] => Tên công ty
    [ma_thuoc_tinh] => ten_cong_ty
    [thu_tu] => 1
    [id_luoc_do] => 5dc30e2142deb6392142f122
    [id_loai_thuoc_tinh] => 5dc30e3442deb6392142f123
    [id_loai_thuoc_tinh_danh_sach] => 5dc43cfbfd0e6812ec175cc6
    [id_loai_thuoc_tinh_loc] => 
    [id_loai_thuoc_tinh_them_sua] => 5dc30e3442deb6392142f123
    [loai_thuoc_tinh_danh_sach] => Array
        (
            [_id] => Array
                (
                    [$oid] => 5dc43cfbfd0e6812ec175cc6
                )

            [trang_thai] => 1
            [ten_loai_thuoc_tinh] => Văn bản
            [ma_loai_thuoc_tinh] => van_ban
            [pham_vi_loai_thuoc_tinh] => truong_danh_sach
            [thu_tu] => 1
            [tham_so_loai_thuoc_tinh] => {
   "danh_sach_tham_so": [
    {
      "model": "tieu_de",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Tiêu đề",
    },
    {
      "model": "loai_truong_them_sua",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Loại trường thêm sửa",
    },
    {
      "model": "kieu_du_lieu",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Kiểu dữ liệu",
    },
    {
      "model": "model",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Model",
    },
    {
      "model": "kich_co",
      "loai_truong_them_sua": "van_ban",
      "kieu_du_lieu": "number",
      "tieu_de": "Kích cỡ",
    }
  ]
}
            [tham_so] => Array
                (
                )

            [loai_thuoc_tinh_goc] => 
        )

    [loai_thuoc_tinh_them_sua] => Array
        (
            [_id] => Array
                (
                    [$oid] => 5dc30e3442deb6392142f123
                )

            [trang_thai] => 1
            [ten_loai_thuoc_tinh] => Văn bản
            [ma_loai_thuoc_tinh] => van_ban
            [thu_tu] => 1
            [pham_vi_loai_thuoc_tinh] => truong_them_sua
            [tham_so_loai_thuoc_tinh] => {
   "danh_sach_tham_so": [
    {
      "model": "tieu_de",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Tiêu đề",
    },
    {
      "model": "loai_truong_them_sua",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Loại trường thêm sửa",
    },
    {
      "model": "kieu_du_lieu",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Kiểu dữ liệu",
    },
    {
      "model": "model",
      "loai_truong_them_sua": "van_ban",
      "tieu_de": "Model",
    },
    {
      "model": "kich_co",
      "loai_truong_them_sua": "van_ban",
      "kieu_du_lieu": "number",
      "tieu_de": "Kích cỡ",
    }
  ]
}
            [loai_thuoc_tinh_goc] => 
            [tham_so] => Array
                (
                    [0] => Array
                        (
                            [_id] => Array
                                (
                                    [$oid] => 5dc45209b7249e6f4467c8e2
                                )

                            [trang_thai] => 1
                            [id_loai_thuoc_tinh] => 5dc44ef7fd0e6812ec175ccc
                            [ten_loai_thuoc_tinh_tham_so] => Tiêu đề
                            [ma_loai_thuoc_tinh_tham_so] => tieu_de
                            [thu_tu] => 1
                            [tham_so_kieu_du_lieu] => text
                            [tham_so_loai_truong_them_sua] => van_ban
                        )

                    [1] => Array
                        (
                            [_id] => Array
                                (
                                    [$oid] => 5dc45679239364639a5e68c2
                                )

                            [trang_thai] => 1
                            [id_loai_thuoc_tinh] => 5dc44ef7fd0e6812ec175ccc
                            [ten_loai_thuoc_tinh_tham_so] => Loại trường thêm sửa
                            [ma_loai_thuoc_tinh_tham_so] => loai_truong_them_sua
                            [tham_so_loai_truong_them_sua] => van_ban
                            [tham_so_kieu_du_lieu] => text
                            [thu_tu] => 2
                        )

                    [2] => Array
                        (
                            [_id] => Array
                                (
                                    [$oid] => 5dc456989fadd261ed0614e2
                                )

                            [trang_thai] => 1
                            [id_loai_thuoc_tinh] => 5dc44ef7fd0e6812ec175ccc
                            [ten_loai_thuoc_tinh_tham_so] => Kiểu dữ liệu
                            [ma_loai_thuoc_tinh_tham_so] => kieu_du_lieu
                            [tham_so_loai_truong_them_sua] => van_ban
                            [tham_so_kieu_du_lieu] => text
                            [thu_tu] => 3
                        )

                    [3] => Array
                        (
                            [_id] => Array
                                (
                                    [$oid] => 5dc456c2c69205054b44cf12
                                )

                            [trang_thai] => 1
                            [id_loai_thuoc_tinh] => 5dc44ef7fd0e6812ec175ccc
                            [ten_loai_thuoc_tinh_tham_so] => Model
                            [ma_loai_thuoc_tinh_tham_so] => model
                            [tham_so_loai_truong_them_sua] => van_ban
                            [tham_so_kieu_du_lieu] => text
                            [thu_tu] => 4
                        )

                )

        )

)
*/
?>