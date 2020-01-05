anphatApp.factory("tong_quat_phan_trang", function() {
	return function($scope) {
		/**
		 * Phan trang
		 */

		$scope.den_trang_dau = function() {
			$scope.phan_trang.trang_hien_thoi = 0;
			$scope.tai_danh_sach();
		};

		$scope.den_trang_cuoi = function() {
			$scope.phan_trang.trang_hien_thoi = $scope.tong_so_trang - 1;
			$scope.tai_danh_sach();
		};

		$scope.den_trang_truoc = function() {
			if ($scope.phan_trang.trang_hien_thoi > 0) {
				$scope.phan_trang.trang_hien_thoi--;
				$scope.tai_danh_sach();
			}
		};

		$scope.den_trang_tiep = function() {
			$scope.phan_trang.trang_hien_thoi++;
			$scope.tai_danh_sach();
		};
	};
});
