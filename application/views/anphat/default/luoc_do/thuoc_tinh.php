<div class="container-fluid" ng-controller="luoc_do_thuoc_tinh_controller">
<h1>Thuộc tính của "{{luoc_do.ten_luoc_do}}" <small><a href="/luoc_do">Quay lại</a></small></h1>
<div class="row">
<div class="col-24">
  <table class="table table-hover">
    <tr>
      <th>Tên thuộc tính</th>
      <th>Mã thuộc tính</th>
      <th><a href="#" class="text-success fa fa-list"></a></th>
      <th><a href="#" class="text-success fa fa-edit"></a></th>
      <th><a href="#" class="text-success fa fa-filter"></a></th>
      <th>Loại TT danh sách</th>
      <th>Loại TT thêm sửa</th>
      <th>Loại TT lọc</th>
      <th>Thứ tự</th>
      <th><a href="#" class="text-success fa fa-circle"></a></th>
      <th><a href="#" class="fa fa-pencil text-primary"></a>
      <a href="#" class="fa fa-trash text-danger"></a></th>
    </tr>
    <tr ng-repeat="thuoc_tinh in danh_sach_thuoc_tinh">
      <td>{{thuoc_tinh.ten_thuoc_tinh}}</td>
      <td>{{thuoc_tinh.ma_thuoc_tinh}}</td>
      <td><a href="#" class="fa fa-list" 
      ng-class="{'text-success': thuoc_tinh.cho_phep_danh_sach, 'text-dark': !thuoc_tinh.cho_phep_danh_sach}" 
      ng-click="thay_doi_trang_thai(thuoc_tinh, 'cho_phep_danh_sach')"></a></td>
      <td><a href="#" class="fa fa-edit" 
      ng-class="{'text-success': thuoc_tinh.cho_phep_them_sua, 'text-dark': !thuoc_tinh.cho_phep_them_sua}" 
      ng-click="thay_doi_trang_thai(thuoc_tinh, 'cho_phep_them_sua')"></a></td>
      <td><a href="#" class="fa fa-filter" 
      ng-class="{'text-success': thuoc_tinh.cho_phep_loc, 'text-dark': !thuoc_tinh.cho_phep_loc}" 
      ng-click="thay_doi_trang_thai(thuoc_tinh, 'cho_phep_loc')"></a></td>
      <td><a href="#" onclick="return false" ng-click="hien_thi_cau_hinh_danh_sach(thuoc_tinh)" ng-show="thuoc_tinh.cho_phep_danh_sach"><span class="fa fa-cog"></span> {{hien_thi_tham_chieu(thuoc_tinh.id_loai_thuoc_tinh_danh_sach, 'id_loai_thuoc_tinh_danh_sach', 'ten_loai_thuoc_tinh', danh_sach_loai_thuoc_tinh)}}</a></td>
      <td><a href="#" onclick="return false" ng-click="hien_thi_cau_hinh_them_sua(thuoc_tinh)" ng-show="thuoc_tinh.cho_phep_them_sua"><span class="fa fa-cog"></span> {{hien_thi_tham_chieu(thuoc_tinh.id_loai_thuoc_tinh_them_sua, 'id_loai_thuoc_tinh_them_sua', 'ten_loai_thuoc_tinh', danh_sach_loai_thuoc_tinh)}}</a></td>
      <td><a href="#" onclick="return false"  ng-click="hien_thi_cau_hinh_loc(thuoc_tinh)" ng-show="thuoc_tinh.cho_phep_loc"><span class="fa fa-cog"></span> {{hien_thi_tham_chieu(thuoc_tinh.id_loai_thuoc_tinh_loc, 'id_loai_thuoc_tinh_loc', 'ten_loai_thuoc_tinh', danh_sach_loai_thuoc_tinh)}}</a></td>
      <td>{{thuoc_tinh.thu_tu}}</td>
      <td><a href="#" class="fa fa-circle" 
      ng-class="{'text-success': thuoc_tinh.trang_thai, 'text-dark': !thuoc_tinh.trang_thai}" 
      ng-click="thay_doi_trang_thai(thuoc_tinh, 'trang_thai')"></a></td>
    <td>
      <a href="#" class="fa fa-pencil text-primary" ng-click="hien_thi_sua_thuoc_tinh(thuoc_tinh)"></a>
      <a href="#" class="fa fa-trash text-danger" ng-click="xoa_thuoc_tinh(thuoc_tinh)"></a>
    </td>
    </tr>
  </table>
</div>
</div>
</div>
<script>
anphatApp.controller('luoc_do_thuoc_tinh_controller', [
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

  $scope.tai_danh_sach_loai_thuoc_tinh = function() {
    tai_danh_sach({
      ten_bang: 'loai_thuoc_tinh',
      dieu_kien: {},
      thu_tu: 'asc',
      sap_xep: 'thu_tu'
    }, function(ket_qua){
      $scope.danh_sach_loai_thuoc_tinh = ket_qua.du_lieu;
      $scope.$apply();
    });
  };

  $scope.tai_danh_sach_loai_thuoc_tinh();

  $scope.tai_danh_sach_thuoc_tinh = function() {
    tai_danh_sach({
      ten_bang: 'thuoc_tinh',
      dieu_kien: {
        id_luoc_do: $scope.luoc_do._id.$oid
      },
      thu_tu: 'asc',
      sap_xep: 'thu_tu'
    }, function(ket_qua){
      $scope.danh_sach_thuoc_tinh = ket_qua.du_lieu;
      $scope.$apply();
    });
  };

  $scope.tai_danh_sach_thuoc_tinh();

  $scope.thay_doi_trang_thai = function(thuoc_tinh, model) {
    thuoc_tinh[model] = !thuoc_tinh[model];
  };

  $scope.hien_thi_cau_hinh_danh_sach = function (thuoc_tinh) {
    $scope.thuoc_tinh_dang_chon = angular.copy(thuoc_tinh);
    jQuery('#modal_cau_hinh_danh_sach').modal('show');
  };

  $scope.hien_thi_cau_hinh_them_sua = function (thuoc_tinh) {
    $scope.thuoc_tinh_dang_chon = angular.copy(thuoc_tinh);
    jQuery('#modal_cau_hinh_them_sua').modal('show');
  };

  $scope.hien_thi_cau_hinh_loc = function (thuoc_tinh) {
    $scope.thuoc_tinh_dang_chon = angular.copy(thuoc_tinh);
    jQuery('#modal_cau_hinh_loc').modal('show');
  };

  $scope.hien_thi_sua_thuoc_tinh = function(thuoc_tinh) {
    $scope.thuoc_tinh_dang_chon = angular.copy(thuoc_tinh);
    jQuery('#modal_sua_thuoc_tinh').modal('show');
  };

  $scope.xoa_thuoc_tinh = function(thuoc_tinh) {
    if(confirm('Bạn có muốn xóa thuộc tính "'+thuoc_tinh.ten_thuoc_tinh+'"')) {
      alert('Xóa');
    }
  };
}]);
</script>