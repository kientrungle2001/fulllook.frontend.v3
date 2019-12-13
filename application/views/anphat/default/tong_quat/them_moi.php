<h2>Thêm mới công ty</h2>
<hr>

<form ng-controller="cong_ty_them_moi_controller">
  <div class="form-row">
    <?php $ban_ghi_moi = (isset($ban_ghi_moi) && $ban_ghi_moi) ? $ban_ghi_moi : 'ban_ghi_moi' ?>
    <?php foreach ($truong_them_sua as $truong) :
      $truong['ban_ghi_cap_nhat'] = $ban_ghi_moi;
      $c->view('truong/' . $truong['loai_truong_them_sua'], $truong);
    endforeach; ?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm', 'model' => 'them_ban_ghi(' . $ban_ghi_moi . ');']) ?>
  </div>
</form>

<script>
  anphatApp.controller('cong_ty_them_moi_controller', ['$scope', 'tai_danh_sach', 'them_ban_ghi', function($scope, tai_danh_sach, them_ban_ghi) {
    $scope.ten_bang = 'cong_ty';
    $scope.id_bo_thuoc_tinh = '<?= $id_bo_thuoc_tinh?>';
    $scope.ma_bo_thuoc_tinh = '<?= $ma_bo_thuoc_tinh?>';

    $scope.du_lieu_tai_tu_dong = <?= json_encode(isset($du_lieu_tai_tu_dong)?$du_lieu_tai_tu_dong: null) ?>;
    if ($scope.du_lieu_tai_tu_dong) {
      $scope.du_lieu_tai_tu_dong.forEach(function(du_lieu) {
        tai_danh_sach(du_lieu.goi_du_lieu, function(ket_qua) {
          $scope[du_lieu.ten_danh_sach] = ket_qua.du_lieu;
          $scope.$apply();
        });
      });
    }

    $scope.lay_danh_sach_quan_huyen = function(id_tinh) {
      if (!id_tinh) return [];
      if (!$scope.danh_sach_tinh_thanh_pho) return [];
      for (var i = 0; i < $scope.danh_sach_tinh_thanh_pho.length; i++) {
        if ($scope.danh_sach_tinh_thanh_pho[i].id == id_tinh)
          return $scope.danh_sach_tinh_thanh_pho[i].quan_huyen;
      }
    };

    /** Them Xoa Sua */
    $scope.ban_ghi_moi = {
      trang_thai: true,
      _id_bo_thuoc_tinh: $scope.id_bo_thuoc_tinh,
      _ma_bo_thuoc_tinh: $scope.ma_bo_thuoc_tinh
    };
    $scope.them_ban_ghi = function(ban_ghi, callback) {
      var ban_ghi_params = angular.copy(ban_ghi);
      them_ban_ghi({
        ten_bang: $scope.ten_bang,
        du_lieu: ban_ghi_params
      }, function(resp) {
        window.location = '/<?= $module?>/danh_sach';
      });
    };

    $scope._them_ban_ghi = them_ban_ghi;

  }]);
</script>