anphatApp.factory("tong_quat_tham_chieu", function() {
	return function($scope, tai_danh_sach) {
		$scope.tai_danh_sach_tham_chieu = function(truong) {
			if (truong.loai_truong_danh_sach == "tham_chieu") {
				var _ids = [];
				for (var i = 0; i < $scope.danh_sach_ban_ghi.length; i++) {
					_ids.pushIfNotExisted($scope.danh_sach_ban_ghi[i][truong.tham_chieu]);
				}
				if (truong.ten_bang) {
					tai_danh_sach(
						{
							ten_bang: truong.ten_bang,
							_ids: _ids,
							id_field: truong.id_field || null,
							dieu_kien: truong.dieu_kien || null,
							kich_co_trang: 100,
							trang_hien_thoi: 0
						},
						function(ket_qua) {
							$scope[truong.danh_sach_tham_chieu] = ket_qua.du_lieu;
							$scope.$apply();
						}
					);
				}
			}
		};

		$scope.hien_thi_tham_chieu = function(
			id,
			tham_chieu,
			gia_tri_tham_chieu,
			danh_sach_tham_chieu
		) {
			if (!danh_sach_tham_chieu) return "";
			for (var i = 0; i < danh_sach_tham_chieu.length; i++) {
				if (
					danh_sach_tham_chieu[i]._id.$oid === id ||
					(danh_sach_tham_chieu[i].id && danh_sach_tham_chieu[i].id === id)
				) {
					return danh_sach_tham_chieu[i][gia_tri_tham_chieu];
				}
			}
		};

		$scope.hien_thi_tham_chieu_huyen = function(
			id,
			tham_chieu,
			gia_tri_tham_chieu,
			danh_sach_tham_chieu
		) {
			if (!danh_sach_tham_chieu) return "";
			if (!id) return "";
			for (var i = 0; i < danh_sach_tham_chieu.length; i++) {
				for (var j = 0; j < danh_sach_tham_chieu[i].quan_huyen.length; j++) {
					if (
						danh_sach_tham_chieu[i].quan_huyen[j]._id.$oid === id ||
						(danh_sach_tham_chieu[i].quan_huyen[j].id &&
							danh_sach_tham_chieu[i].quan_huyen[j].id === id)
					) {
						return danh_sach_tham_chieu[i].quan_huyen[j][gia_tri_tham_chieu];
					}
				}
			}
		};

		$scope.lay_danh_sach_quan_huyen = function(id_tinh) {
			if (!id_tinh) return [];
			if (!$scope.danh_sach_tinh_thanh_pho) return [];
			for (var i = 0; i < $scope.danh_sach_tinh_thanh_pho.length; i++) {
				if ($scope.danh_sach_tinh_thanh_pho[i].id == id_tinh)
					return $scope.danh_sach_tinh_thanh_pho[i].quan_huyen;
			}
		};
	};
});
