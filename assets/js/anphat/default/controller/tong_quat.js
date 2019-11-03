anphatApp.controller('tong_quat_controller', ['$scope', 
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
  $scope.tai_danh_sach = function() {
    tai_danh_sach({
      ten_bang: $scope.ten_bang,
      dieu_kien: $scope.dieu_kien || {},
      kich_co_trang: $scope.kich_co_trang_ban_ghi || 100,
      trang_hien_thoi: $scope.trang_hien_thoi_ban_ghi || 0
    }, function(danh_sach) {
      $scope.danh_sach_ban_ghi = danh_sach.du_lieu;
      $scope.$apply();
    });
  };

  $scope._tai_danh_sach = tai_danh_sach;

  /** Them Xoa Sua */
  $scope.ban_ghi_moi = {
    trang_thai: true
  };
  $scope.them_ban_ghi = function(ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    them_ban_ghi(
      {ten_bang: $scope.ten_bang, du_lieu: ban_ghi_params}, function(resp) {
        if(callback) return callback(resp);
        $scope.tai_danh_sach();
    });
  };

  $scope._them_ban_ghi = them_ban_ghi;

  $scope.sua_ban_ghi = function(ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    var id = ban_ghi_params._id.$oid;
    delete ban_ghi_params._id;
    sua_ban_ghi(
      id,
      {ten_bang: $scope.ten_bang, du_lieu: ban_ghi_params}, function(resp) {
      if(callback) return callback(resp);
      $scope.tai_danh_sach();
    });
  };

  $scope._sua_ban_ghi = sua_ban_ghi;

  $scope.xoa_ban_ghi = function(ban_ghi, callback) {
    var ban_ghi_params = angular.copy(ban_ghi);
    var id = ban_ghi_params._id.$oid;
    delete ban_ghi_params._id;
    xoa_ban_ghi(
      id,
      {ten_bang: $scope.ten_bang}, function(resp) {
      if(callback) return callback(resp);
      $scope.tai_danh_sach();
    });
  };

  $scope._xoa_ban_ghi = xoa_ban_ghi;

  /** Thay đổi trạng thái */
  $scope.thay_doi_trang_thai = function(ban_ghi, callback) {
    ban_ghi.trang_thai = !ban_ghi.trang_thai;
    var cap_nhat = {
      _id: angular.copy(ban_ghi._id),
      trang_thai: ban_ghi.trang_thai
    };
    $scope.sua_ban_ghi(cap_nhat, function(resp) {
      // do nothing
      if(callback) return callback(resp);
    });
  };

  /** Mở dialog sửa bản ghi */
  $scope.mo_dialog_sua_ban_ghi = function(ban_ghi, ten_dialog) {
    $scope.ban_ghi_cap_nhat = angular.copy(ban_ghi);
    jQuery('#' + ten_dialog).modal('show');
  };

  $scope.dong_dialog_sua_ban_ghi = function(ten_dialog) {
    jQuery('#' + ten_dialog).modal('hide');
  };

  $scope.mo_dialog_them_ban_ghi = function(ten_dialog) {
    jQuery('#' + ten_dialog).modal('show');
  };

  $scope.dong_dialog_them_ban_ghi = function(ten_dialog) {
    jQuery('#' + ten_dialog).modal('hide');
  };

  $scope.hien_thi_bo_loc = false;
  $scope.chuyen_doi_hien_thi_bo_loc = function() {
    $scope.hien_thi_bo_loc = !$scope.hien_thi_bo_loc;
  }

  $scope.loc_du_lieu = function(bo_loc) {
    console.log(angular.copy(bo_loc));
  };

  $scope.tai_danh_sach_bo_loc = function(tham_so, ten_danh_sach) {
    tai_danh_sach(tham_so, function(ket_qua) {
      $scope[ten_danh_sach] = ket_qua.du_lieu;
      $scope.$apply();
    });
  };
  
  $scope.tai_danh_sach_bo_loc_thay_doi = function(tham_so_thay_doi, ten_danh_sach_thay_doi, dieu_kien_thay_doi, gia_tri) {
    if(gia_tri) {
      tham_so_thay_doi.dieu_kien[dieu_kien_thay_doi] = gia_tri;
      tai_danh_sach(tham_so_thay_doi, function(ket_qua) {
        $scope[ten_danh_sach_thay_doi] = ket_qua.du_lieu;
        $scope.$apply();
      });
    } else {
      $scope[ten_danh_sach_thay_doi] = [];
      $scope.$apply();
    }
  };

  // lay du lieu
  $scope.tai_danh_sach();
}]);