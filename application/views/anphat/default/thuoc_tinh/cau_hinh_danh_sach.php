<h1 class="text-center"><?= $ten_thuoc_tinh ?> - <?= $ma_thuoc_tinh ?></h1>
<form ng-controller="thuoc_tinh_danh_sach_controller">
<?php
foreach($loai_thuoc_tinh_danh_sach['tham_so'] as $tham_so) {
    $controller->view('truong/' . $tham_so['tham_so_loai_truong_them_sua'], [
        'kich_co' => 6,
        'model' => 'thuoc_tinh_danh_sach.'.$tham_so['ma_loai_thuoc_tinh_tham_so'],
        'tieu_de' => $tham_so['ten_loai_thuoc_tinh_tham_so'],
        'kieu_du_lieu' => $tham_so['tham_so_kieu_du_lieu']
    ]);

}


?>
<button class="btn btn-primary" ng-click="cap_nhat_ban_ghi_cua_bang('<?= $_id['$oid']?>', 'thuoc_tinh', {'cau_hinh_danh_sach': thuoc_tinh_danh_sach}, chuyen_trang('/thuoc_tinh'))">Luu</button>
</form>
<?php 
$cau_hinh_danh_sach_mac_dinh = [
    'model' => $ma_thuoc_tinh,
    'tieu_de' => $ten_thuoc_tinh,
    'loai_truong_danh_sach' => $loai_thuoc_tinh_danh_sach['ma_loai_thuoc_tinh'],
    'loai_truong_tieu_de' => 'van_ban'
];
?>
<script>
anphatApp.controller('thuoc_tinh_danh_sach_controller', ['$scope', 'sua_ban_ghi', function($scope, sua_ban_ghi) {
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

  $scope.thuoc_tinh_danh_sach = <?= isset($cau_hinh_danh_sach)? json_encode($cau_hinh_danh_sach): json_encode($cau_hinh_danh_sach_mac_dinh)?>;
}]);
</script>