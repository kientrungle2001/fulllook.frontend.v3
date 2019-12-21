anphatApp.factory("tong_quat_danh_sach", function() {
	return function($scope, tai_danh_sach) {
		/** Tai danh sach */
		$scope.tai_danh_sach = function() {
			var bo_loc = angular.copy($scope.bo_loc);
			if (bo_loc && bo_loc.id_tinh && bo_loc.id_tinh.length == 0) {
				delete bo_loc.id_tinh;
			}
			if (bo_loc && bo_loc.id_tinh && bo_loc.id_tinh.length > 1) {
				$scope.danh_sach_ban_ghi = [];
				for (var i = 0; i < bo_loc.id_tinh.length; i++) {
					var bo_loc_tinh = angular.copy(bo_loc);
					bo_loc_tinh.id_tinh = bo_loc.id_tinh[i];
					tai_danh_sach(
						{
							ten_bang: $scope.ten_bang,
							tu_khoa: $scope.tu_khoa,
							tim_kiem_theo: $scope.tim_kiem_theo,
							dieu_kien: jQuery.extend(
								angular.copy($scope.dieu_kien) || {},
								bo_loc_tinh
							),
							kich_co_trang: $scope.phan_trang.kich_co_trang || 50,
							trang_hien_thoi: $scope.phan_trang.trang_hien_thoi || 0,
							sap_xep: $scope.sap_xep,
							thu_tu: $scope.thu_tu
						},
						function(danh_sach) {
							$scope.danh_sach_ban_ghi.combine(danh_sach.du_lieu);
							// $scope.tron_vao_mang($scope.danh_sach_ban_ghi, danh_sach.du_lieu);
							$scope.$apply();
						}
					);
				}

				setTimeout(function() {
					if ($scope.truong_danh_sach) {
						$scope.truong_danh_sach.forEach(function(truong) {
							$scope.tai_danh_sach_tham_chieu(truong);
						});
					}
					$scope.$apply();
				}, 500);
			} else {
				tai_danh_sach(
					{
						ten_bang: $scope.ten_bang,
						tu_khoa: $scope.tu_khoa,
						tim_kiem_theo: $scope.tim_kiem_theo,
						dieu_kien: jQuery.extend(
							angular.copy($scope.dieu_kien) || {},
							bo_loc
						),
						kich_co_trang: $scope.phan_trang.kich_co_trang || 50,
						trang_hien_thoi: $scope.phan_trang.trang_hien_thoi || 0,
						sap_xep: $scope.sap_xep,
						thu_tu: $scope.thu_tu
					},
					function(danh_sach) {
						$scope.danh_sach_ban_ghi = danh_sach.du_lieu;
						if ($scope.truong_danh_sach) {
							$scope.truong_danh_sach.forEach(function(truong) {
								$scope.tai_danh_sach_tham_chieu(truong);
							});
						}

						$scope.$apply();
					}
				);
			}
    };
    
    $scope._tai_danh_sach = tai_danh_sach;
	};
});
