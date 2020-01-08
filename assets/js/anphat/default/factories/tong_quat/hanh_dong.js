anphatApp.factory("tong_quat_hanh_dong", function() {
	return function($scope) {
		$scope.cac_ban_ghi_dang_chon = {};
		$scope.chon_tat_ca = function() {
			$scope.danh_sach_ban_ghi.forEach(function(ban_ghi) {
				$scope.cac_ban_ghi_dang_chon[ban_ghi._id.$oid] =
					$scope.trang_thai_chon_tat_ca;
			});
		};
	};
});
