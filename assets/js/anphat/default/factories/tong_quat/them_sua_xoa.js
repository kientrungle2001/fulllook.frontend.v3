anphatApp.factory("tong_quat_them_sua_xoa", function() {
	return function($scope, them_ban_ghi, sua_ban_ghi, xoa_ban_ghi) {
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
		
		/** Them Xoa Sua */
		$scope.ban_ghi_moi = {
			trang_thai: true
		};
		$scope.them_ban_ghi = function(ban_ghi, callback) {
			var ban_ghi_params = angular.copy(ban_ghi);
			them_ban_ghi(
				{ ten_bang: $scope.ten_bang, du_lieu: ban_ghi_params },
				function(resp) {
					if (callback) return callback(resp);
					$scope.tai_danh_sach();
				}
			);
		};

		$scope._them_ban_ghi = them_ban_ghi;

		$scope.sua_ban_ghi = function(ban_ghi, callback) {
			var ban_ghi_params = angular.copy(ban_ghi);
			var id = ban_ghi_params._id.$oid;
			delete ban_ghi_params._id;
			sua_ban_ghi(
				id,
				{ ten_bang: $scope.ten_bang, du_lieu: ban_ghi_params },
				function(resp) {
					if (callback) return callback(resp);
					$scope.tai_danh_sach();
				}
			);
		};

		$scope.sua_ban_ghi_cua_bang = function(ten_bang, ban_ghi, callback) {
			var ban_ghi_params = angular.copy(ban_ghi);
			var id = ban_ghi_params._id.$oid;
			delete ban_ghi_params._id;
			sua_ban_ghi(id, { ten_bang: ten_bang, du_lieu: ban_ghi_params }, function(
				resp
			) {
				if (callback) return callback(resp);
				$scope.tai_danh_sach();
			});
		};

		$scope.cap_nhat_ban_ghi_cua_bang = function(
			id,
			ten_bang,
			ban_ghi,
			callback
		) {
			var ban_ghi_params = angular.copy(ban_ghi);
			delete ban_ghi_params._id;
			sua_ban_ghi(id, { ten_bang: ten_bang, du_lieu: ban_ghi_params }, function(
				resp
			) {
				if (callback) return callback(resp);
				$scope.tai_danh_sach();
			});
		};

		$scope._sua_ban_ghi = sua_ban_ghi;

		$scope.xoa_ban_ghi = function(ban_ghi, callback) {
			if (confirm("Bạn có muốn xóa bản ghi này?")) {
				var ban_ghi_params = angular.copy(ban_ghi);
				var id = ban_ghi_params._id.$oid;
				delete ban_ghi_params._id;
				xoa_ban_ghi(id, { ten_bang: $scope.ten_bang }, function(resp) {
					if (callback) return callback(resp);
					$scope.tai_danh_sach();
				});
			}
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
	};
});
