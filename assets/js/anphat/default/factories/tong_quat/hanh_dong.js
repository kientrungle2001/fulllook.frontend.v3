anphatApp.factory("tong_quat_hanh_dong", function() {
	return function($scope, sua_ban_ghi) {
		$scope.cac_ban_ghi_dang_chon = {};
		$scope.chon_tat_ca = function() {
			$scope.danh_sach_ban_ghi.forEach(function(ban_ghi) {
				$scope.cac_ban_ghi_dang_chon[ban_ghi._id.$oid] =
					$scope.trang_thai_chon_tat_ca;
			});
		};
		$scope.gan_nhan_vien_kinh_doanh = function() {
      var ids = [];
			for (var id in $scope.cac_ban_ghi_dang_chon) {
				if ($scope.cac_ban_ghi_dang_chon[id]) {
          ids.push(id);
				}
      }
      if(0 && !$scope.nhan_vien_kinh_doanh) {
        alert('Bạn cần chọn nhân viên kinh doanh để gán');
        return false;
      }
      if(ids.length === 0) {
        alert('Bạn cần chọn bản ghi để gán');
        return false;
      }
      ids.forEach(function(id) {
        sua_ban_ghi(id, {
          ten_bang: $scope.ten_bang,
          du_lieu: {
            nhan_vien_kinh_doanh: $scope.nhan_vien_kinh_doanh
          }
        }, function() {

        });
      });
      setTimeout(function() {
        $scope.tai_danh_sach();
      }, 2000);
		};
	};
});
