anphatApp.controller('dia_diem_controller', ['$scope', 
  'tai_danh_sach', 
  'them_ban_ghi',
  'sua_ban_ghi',
  'xoa_ban_ghi', 
  function($scope,  
    tai_danh_sach, 
    them_ban_ghi,
    sua_ban_ghi,
    xoa_ban_ghi
    ) {
  /** Tai danh sach */
  $scope.tai_danh_sach_tinh = function() {
    tai_danh_sach({
      ten_bang: 'dia_diem',
      dieu_kien: {
        loai_dia_diem: 'tinh'
      },
      kich_co_trang: $scope.kich_co_trang_dia_diem || 100,
      trang_hien_thoi: $scope.trang_hien_thoi_dia_diem || 0
    }, function(danh_sach_tinh) {
      $scope.danh_sach_tinh = danh_sach_tinh.du_lieu;
      $scope.$apply();
    });
  };

  $scope.tai_danh_sach_huyen = function(tinh) {
    $scope.tinh_dang_chon = tinh;
    $scope.them_huyen.id_khu_vuc = tinh._id.$oid;
    tai_danh_sach({
      ten_bang: 'dia_diem',
      dieu_kien: {
        loai_dia_diem: 'huyen',
        id_khu_vuc: tinh._id.$oid
      },
      kich_co_trang: $scope.kich_co_trang_dia_diem || 100,
      trang_hien_thoi: $scope.trang_hien_thoi_dia_diem || 0
    }, function(danh_sach_huyen){
      $scope.danh_sach_huyen = danh_sach_huyen.du_lieu;
      $scope.$apply();
    });
  };

  /** Them Xoa Sua */
  $scope.them_tinh = {
    loai_dia_diem: 'tinh',
    trang_thai: true
  };
  $scope.them_huyen = {
    loai_dia_diem: 'huyen',
    trang_thai: true
  };
  $scope.them_dia_diem = function(dia_diem, callback) {
    var dia_diem_params = angular.copy(dia_diem);
    them_ban_ghi(
      {ten_bang: 'dia_diem', du_lieu: dia_diem_params}, function(resp) {
        if(callback) return callback(resp);
      if(dia_diem_params.loai_dia_diem == 'tinh') {
        $scope.tai_danh_sach_tinh();
      } else {
        $scope.tai_danh_sach_huyen($scope.tinh_dang_chon);
      }
    });
  };

  $scope.sua_dia_diem = function(dia_diem, callback) {
    var dia_diem_params = angular.copy(dia_diem);
    var id = dia_diem_params._id.$oid;
    delete dia_diem_params._id;
    sua_ban_ghi(
      id,
      {ten_bang: 'dia_diem', du_lieu: dia_diem_params}, function(resp) {
      if(callback) return callback(resp);
      if(dia_diem_params.loai_dia_diem == 'tinh') {
        $scope.tai_danh_sach_tinh();
      } else {
        $scope.tai_danh_sach_huyen($scope.tinh_dang_chon);
      }
    });
  };

  $scope.xoa_dia_diem = function(dia_diem, callback) {
    var dia_diem_params = angular.copy(dia_diem);
    var id = dia_diem_params._id.$oid;
    delete dia_diem_params._id;
    xoa_ban_ghi(
      id,
      {ten_bang: 'dia_diem'}, function(resp) {
      if(callback) return callback(resp);
      if(dia_diem_params.loai_dia_diem == 'tinh') {
        $scope.tai_danh_sach_tinh();
      } else {
        $scope.tai_danh_sach_huyen($scope.tinh_dang_chon);
      }
    });
  };

  /** Thay đổi trạng thái */
  $scope.thay_doi_trang_thai = function(dia_diem) {
    dia_diem.trang_thai = !dia_diem.trang_thai;
    var cap_nhat = {
      _id: angular.copy(dia_diem._id),
      trang_thai: dia_diem.trang_thai
    };
    $scope.sua_dia_diem(cap_nhat, function() {
      // do nothing
    });
  };

  // lay du lieu
  $scope.tai_danh_sach_tinh();
}]);