anphatApp.controller('tong_quat_controller', ['$scope', 
  'tai_danh_sach', 
  'them_ban_ghi',
  'sua_ban_ghi',
  'xoa_ban_ghi',
  'phan_trang', 
  'tong_quat_phan_trang',
  'tong_quat_them_sua_xoa',
  'tong_quat_danh_sach',
  'tong_quat_tham_chieu',
  'tong_quat_bo_loc',
  'tong_quat_hanh_dong',
  'tong_quat_tai_tu_dong',
  'tong_quat_bo_thuoc_tinh',
  'lap_chi_muc',
  function($scope,  
    tai_danh_sach, 
    them_ban_ghi,
    sua_ban_ghi,
    xoa_ban_ghi,
    phan_trang,
    tong_quat_phan_trang,
    tong_quat_them_sua_xoa,
    tong_quat_danh_sach,
    tong_quat_tham_chieu,
    tong_quat_bo_loc,
    tong_quat_hanh_dong,
    tong_quat_tai_tu_dong,
    tong_quat_bo_thuoc_tinh,
    lap_chi_muc
    ) {
  
  $scope.phan_trang = phan_trang;

  tong_quat_danh_sach($scope, tai_danh_sach);

  tong_quat_tai_tu_dong($scope, tai_danh_sach);

  tong_quat_hanh_dong($scope, sua_ban_ghi);

  /*
  loai_thuoc_tinh('so_xuong', 'truong_them_sua', function(ket_qua) {
    console.log(ket_qua);
  });
  */

  tong_quat_tham_chieu($scope, tai_danh_sach);

  tong_quat_phan_trang($scope);

  tong_quat_them_sua_xoa($scope, them_ban_ghi, sua_ban_ghi, xoa_ban_ghi);

  tong_quat_bo_loc($scope, tai_danh_sach);

  // lay du lieu
  $scope.tai_danh_sach();

  $scope.chuyen_trang = function(url) {
    return function() {
      window.location = url;
    };
  };

  tong_quat_bo_thuoc_tinh($scope, tai_danh_sach);

  $scope.lap_chi_muc = function() {
    lap_chi_muc(function() {
      alert('Done');
    });
  };
}]);