anphatApp.factory("tong_quat_bo_thuoc_tinh", function() {
	return function($scope, tai_danh_sach) {
		$scope.mo_dialog_them_theo_bo_thuoc_tinh = function() {
			jQuery("#modal_them_theo_bo_thuoc_tinh").modal("show");
		};

		$scope.tai_danh_sach_bo_thuoc_tinh = function($callback) {
			tai_danh_sach(
				{
					ten_bang: "bo_thuoc_tinh",
					dieu_kien: {
						id_luoc_do: $scope.id_luoc_do
					},
					truong: ["_id", "ten_bo_thuoc_tinh"]
				},
				function(danh_sach_bo_thuoc_tinh) {
					$scope.danh_sach_bo_thuoc_tinh = danh_sach_bo_thuoc_tinh.du_lieu;
					$scope.$apply();
					if ($callback) $callback(danh_sach_bo_thuoc_tinh);
				}
			);
		};

		$scope.tai_danh_sach_bo_thuoc_tinh();
	};
});
