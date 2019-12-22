<div class="container-fluid" ng-controller="luoc_do_bo_thuoc_tinh_controller">
<h1>Bộ Thuộc tính của "{{luoc_do.ten_luoc_do}}" <small><a href="/luoc_do">Quay lại</a></small></h1>
<div class="row">
<div class="col-8">
  <table class="table table-hover">
    <tr>
      <th>Tên bộ thuộc tính</th>
      <th>Mã Bộ thuộc tính</th>
      <th>Danh sách thuộc tính</th>
      <th>Thứ tự</th>
      <th><a href="#" class="text-success fa fa-circle"></a></th>
      <th><a href="#" class="fa fa-pencil text-primary"></a>
      <a href="#" class="fa fa-trash text-danger"></a></th>
    </tr>
    <tr ng-repeat="bo_thuoc_tinh in danh_sach_bo_thuoc_tinh">
      <td>{{bo_thuoc_tinh.ten_bo_thuoc_tinh}}</td>
      <td>{{bo_thuoc_tinh.ma_bo_thuoc_tinh}}</td>
      <td><a href="#">Danh sách thuộc tính</a></td>
      <td>{{bo_thuoc_tinh.thu_tu}}</td>
      <td><a href="#" class="fa fa-circle" 
      ng-class="{'text-success': bo_thuoc_tinh.trang_thai, 'text-dark': !bo_thuoc_tinh.trang_thai}" 
      ng-click="thay_doi_trang_thai(bo_thuoc_tinh, 'trang_thai')"></a></td>
    <td>
      <a href="#" class="fa fa-pencil text-primary" ng-click="mo_dialog_sua_ban_ghi(bo_thuoc_tinh)"></a>
      <a href="#" class="fa fa-trash text-danger" ng-click="xoa_ban_ghi(bo_thuoc_tinh)"></a>
    </td>
    </tr>
  </table>
</div>
<div class="col-16">
  <h2 class="text-center">Danh sách thuộc tính của bộ thuộc tính</h2>
</div>
</div>
</div>
<script>
anphatApp.controller('luoc_do_bo_thuoc_tinh_controller', [
  '$scope',
  'tai_danh_sach', function($scope,
    tai_danh_sach) {
  $scope.luoc_do = <?= json_encode($luoc_do) ?>;
  
  $scope.hien_thi_tham_chieu = function(id, tham_chieu, gia_tri_tham_chieu, danh_sach_tham_chieu) {
    if(!danh_sach_tham_chieu) return '';
    for(var i = 0; i < danh_sach_tham_chieu.length; i++) {
      if(danh_sach_tham_chieu[i]._id.$oid === id || 
          (danh_sach_tham_chieu[i].id && (danh_sach_tham_chieu[i].id === id))) {
        return danh_sach_tham_chieu[i][gia_tri_tham_chieu];
      }
    }
  };

  $scope.tai_danh_sach_bo_thuoc_tinh = function() {
    tai_danh_sach({
      ten_bang: 'bo_thuoc_tinh',
      dieu_kien: {
        id_luoc_do: $scope.luoc_do._id.$oid
      },
      thu_tu: 'asc',
      sap_xep: 'thu_tu'
    }, function(ket_qua){
      $scope.danh_sach_bo_thuoc_tinh = ket_qua.du_lieu;
      $scope.$apply();
    });
  };

  $scope.tai_danh_sach_bo_thuoc_tinh();

  $scope.thay_doi_trang_thai = function(thuoc_tinh, model) {
    thuoc_tinh[model] = !thuoc_tinh[model];
  };
}]);
</script>
