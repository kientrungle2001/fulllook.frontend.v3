anphatApp.factory("tong_quat_bo_loc", function() {
	return function($scope, tai_danh_sach) {
		$scope.hien_thi_bo_loc = false;
		$scope.chuyen_doi_hien_thi_bo_loc = function() {
			$scope.hien_thi_bo_loc = !$scope.hien_thi_bo_loc;
		};

		$scope.bo_loc = {};
		$scope.bo_loc_chi_tiet = {};
		$scope.so_sanh = {
			bo_loc_chi_tiet: {}
		};
		$scope.tim_kiem_bo_loc = {
			bo_loc: {},
			bo_loc_chi_tiet: {}
		};
		$scope.loc_du_lieu = function() {
			for (var k in $scope.bo_loc) {
				if (null === $scope.bo_loc[k]) {
					delete $scope.bo_loc[k];
				} else {
					if (
						typeof $scope.bo_loc[k] == "object" &&
						$scope.bo_loc[k].constructor.name == "Array" &&
						$scope.bo_loc[k].length == 0
					) {
						delete $scope.bo_loc[k];
					}
				}
			}
			for (var k in $scope.bo_loc_chi_tiet) {
				if (null === $scope.bo_loc_chi_tiet[k]) {
					delete $scope.bo_loc_chi_tiet[k];
				} else {
					if (
						typeof $scope.bo_loc_chi_tiet[k] == "object" &&
						$scope.bo_loc_chi_tiet[k].constructor.name == "Array" &&
						$scope.bo_loc_chi_tiet[k].length == 0
					) {
						delete $scope.bo_loc_chi_tiet[k];
					}
				}
			}
			$scope.den_trang_dau();
		};

		$scope.chon_ban_ghi = function(danh_sach, id, ten_ban_ghi) {
			if (!id) {
				return ($scope[ten_ban_ghi] = null);
			}
			for (var i = 0; i < danh_sach.length; i++) {
				if (danh_sach[i].id && danh_sach[i].id == id) {
					return ($scope[ten_ban_ghi] = danh_sach[i]);
				} else {
					if (danh_sach[i]._id.$oid && danh_sach[i]._id.$oid == id) {
						return ($scope[ten_ban_ghi] = danh_sach[i]);
					}
				}
			}
			return ($scope[ten_ban_ghi] = null);
		};

		$scope.chon_ban_ghi_them_sua = function(
			danh_sach,
			ten_model,
			ten_ban_ghi
		) {};

		$scope.tai_danh_sach_bo_loc = function(tham_so, ten_danh_sach) {
			tai_danh_sach(tham_so, function(ket_qua) {
				$scope[ten_danh_sach] = ket_qua.du_lieu;
				$scope.$apply();
			});
		};

		$scope.tai_danh_sach_bo_loc_thay_doi = function(
			tham_so_thay_doi,
			ten_danh_sach_thay_doi,
			dieu_kien_thay_doi,
			gia_tri
		) {
			if (gia_tri) {
				tham_so_thay_doi.dieu_kien[dieu_kien_thay_doi] = gia_tri;
				tai_danh_sach(tham_so_thay_doi, function(ket_qua) {
					$scope[ten_danh_sach_thay_doi] = ket_qua.du_lieu;
					$scope.$apply();
				});
			} else {
				$scope[ten_danh_sach_thay_doi] = [];
			}
		};
	};
});
