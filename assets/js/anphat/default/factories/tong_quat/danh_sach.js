anphatApp.factory("tong_quat_danh_sach", function() {
	return function($scope, tai_danh_sach) {
		/** Tai danh sach */
		$scope.tai_danh_sach = function() {
			$scope.cac_ban_ghi_dang_chon = {};
			var dieu_kien_chi_tiet = [];
			if($scope.ten_bang == 'cong_ty') {
				if(localStorage.getItem('ma_chuc_vu') == '3') {
					$scope.ma_chuc_vu = localStorage.getItem('ma_chuc_vu');
					dieu_kien_chi_tiet.push({
						ten_truong: 'nhan_vien_kinh_doanh',
						so_sanh: 'eq',
						gia_tri: localStorage.getItem('ten_dang_nhap')
					});
				}
			}
			for(var ten_truong in $scope.bo_loc_chi_tiet) {
				dieu_kien_chi_tiet.push({
					ten_truong: ten_truong,
					so_sanh: $scope.so_sanh.bo_loc_chi_tiet[ten_truong],
					gia_tri: $scope.bo_loc_chi_tiet[ten_truong]
				});
			}
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
							dieu_kien_chi_tiet: dieu_kien_chi_tiet,
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
						dieu_kien_chi_tiet: dieu_kien_chi_tiet,
						kich_co_trang: $scope.phan_trang.kich_co_trang || 50,
						trang_hien_thoi: $scope.phan_trang.trang_hien_thoi || 0,
						sap_xep: $scope.sap_xep,
						thu_tu: $scope.thu_tu
					},
					function(danh_sach) {
						$scope.danh_sach_ban_ghi = danh_sach.du_lieu;
						$scope.tong_so_ban_ghi = danh_sach.tong_so_ban_ghi;
						$scope.tong_so_trang = Math.ceil($scope.tong_so_ban_ghi / $scope.phan_trang.kich_co_trang);
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
