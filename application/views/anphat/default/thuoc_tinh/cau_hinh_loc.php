<h1 class="text-center"><?= $ten_thuoc_tinh ?> - <?= $ma_thuoc_tinh ?></h1>
<form ng-controller="thuoc_tinh_loc_controller">
<?php
foreach($loai_thuoc_tinh_loc['tham_so'] as $tham_so) {
    $controller->view('truong/' . $tham_so['tham_so_loai_truong_them_sua'], [
        'kich_co' => 6,
        'model' => 'thuoc_tinh_loc.'.$tham_so['ma_loai_thuoc_tinh_tham_so'],
        'tieu_de' => $tham_so['ten_loai_thuoc_tinh_tham_so'],
        'kieu_du_lieu' => $tham_so['tham_so_kieu_du_lieu']
    ]);
}
?>
<button class="btn btn-primary" ng-click="cap_nhat_ban_ghi_cua_bang('<?= $_id['$oid']?>', 'thuoc_tinh', {'cau_hinh_loc': thuoc_tinh_loc}, chuyen_trang('/thuoc_tinh'))">Luu</button>
</form>
<?php 
$cau_hinh_loc_mac_dinh = [
    'model' => $ma_thuoc_tinh,
    'tieu_de' => $ten_thuoc_tinh,
    'loai_truong_loc' => $loai_thuoc_tinh_loc['ma_loai_thuoc_tinh'],
    'kieu_du_lieu' => 'text'
];
?>
<script>
anphatApp.controller('thuoc_tinh_loc_controller', ['$scope', 'sua_ban_ghi', function($scope, sua_ban_ghi) {
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
      window.location = url;
    };
  };

  $scope.thuoc_tinh_loc = <?= isset($cau_hinh_loc)? json_encode($cau_hinh_loc): json_encode($cau_hinh_loc_mac_dinh)?>;
}]);
</script>