anphatApp.controller('nhan_vien_controller', ['$scope', 'tai_danh_sach', function($scope, tai_danh_sach) {
  $scope.ten_bang = 'nhan_vien';
  $scope.tai_danh_sach_phong_ban = function() {
    tai_danh_sach({
      ten_bang: 'phong_ban',
      dieu_kien: {
        trang_thai: true
      }
    }, function(danh_sach_phong_ban) {
      $scope.danh_sach_phong_ban = danh_sach_phong_ban.du_lieu;
      $scope.$apply();
    });
  };
  $scope.tai_danh_sach_chuc_vu = function() {
    tai_danh_sach({
      ten_bang: 'chuc_vu',
      dieu_kien: {
        trang_thai: true
      }
    }, function(danh_sach_chuc_vu) {
      $scope.danh_sach_chuc_vu = danh_sach_chuc_vu.du_lieu;
      $scope.$apply();
    });
  };

  /** Tai du lieu */
  $scope.tai_danh_sach_phong_ban();
  $scope.tai_danh_sach_chuc_vu();
}]);