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
      tu_khoa: $scope.tu_khoa,
      tim_kiem_theo: $scope.tim_kiem_theo,
      dieu_kien: jQuery.extend(angular.copy($scope.dieu_kien) || {}, angular.copy($scope.bo_loc)),
      kich_co_trang: $scope.kich_co_trang || 100,
      trang_hien_thoi: $scope.trang_hien_thoi || 0,
      sap_xep: $scope.sap_xep,
      thu_tu: $scope.thu_tu
    }, function(danh_sach) {
      $scope.danh_sach_ban_ghi = danh_sach.du_lieu;
      $scope.truong_danh_sach.forEach(function(truong) {
        $scope.tai_danh_sach_tham_chieu(truong);
      });
      $scope.$apply();
    });
  };

  $scope.tai_danh_sach_tham_chieu = function(truong) {
    if(truong.loai_truong_danh_sach == 'tham_chieu') {
      var _ids = [];
      for(var i = 0; i < $scope.danh_sach_ban_ghi.length; i++) {
        _ids.pushIfNotExisted($scope.danh_sach_ban_ghi[i][truong.tham_chieu]);
      }
      tai_danh_sach({
        ten_bang: truong.ten_bang,
        _ids: _ids,
        dieu_kien: {trang_thai: true},
        kich_co_trang: 100,
        trang_hien_thoi: 0
      }, function(ket_qua) {
        $scope[truong.danh_sach_tham_chieu] = ket_qua.du_lieu;
        $scope.$apply();
      });
    }
  };

  $scope._tai_danh_sach = tai_danh_sach;

  $scope.hien_thi_tham_chieu = function(id, tham_chieu, gia_tri_tham_chieu, danh_sach_tham_chieu) {
    console.log(danh_sach_tham_chieu);
    for(var i = 0; i < danh_sach_tham_chieu.length; i++) {
      if(danh_sach_tham_chieu[i]._id.$oid === id) {
        return danh_sach_tham_chieu[i][gia_tri_tham_chieu];
      }
    }
  };

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
  $scope.mo_dialog_sua_ban_ghi = function(ban_ghi, ten_dialog, truong_them_sua) {
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

  $scope.bo_loc = {};
  $scope.loc_du_lieu = function() {
    for(var k in $scope.bo_loc) {
      if(null === $scope.bo_loc[k]) {
        delete $scope.bo_loc[k];
      }
    }
    $scope.tai_danh_sach();
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
    }
  };

  $scope.trang_hien_thoi = 0;
  $scope.kich_co_trang = 100;

  $scope.den_trang_truoc = function() {
    if($scope.trang_hien_thoi > 0) {
      $scope.trang_hien_thoi--;
      $scope.tai_danh_sach();
    }
  };

  $scope.den_trang_tiep = function() {
    $scope.trang_hien_thoi++;
    $scope.tai_danh_sach();
  };

  // lay du lieu
  $scope.tai_danh_sach();
}]);