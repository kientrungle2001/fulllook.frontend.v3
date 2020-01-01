/** Factories */

/** Phan trang */

anphatApp.factory('phan_trang', [function() {
	return {
		trang_hien_thoi: 0,
		kich_co_trang: 50
	};
}]);

/** Dia diem */
anphatApp.factory('tai_danh_sach_dia_diem', function() {
	return function(params, $callback) {
		proxy_ajax({
      url: APC.api.v1.dia_diem.url,
      type: AJAX_CONSTANTS.type.get,
      data: {
        dieu_kien: {
					loai_dia_diem: params.loai_dia_diem,
					id_khu_vuc: params.id_khu_vuc || null,
          trang_thai: params.trang_thai
        },
        sap_xep: 'thu_tu',
        thu_tu: 'asc',
        kich_co_trang: params.kich_co_trang,
        trang_hien_thoi: params.trang_hien_thoi
      },
      success: function(danh_sach_dia_diem) {
        $callback(danh_sach_dia_diem);
      }
    });
	};
});

anphatApp.factory('them_dia_diem', function() {
	return function(params, $callback) {
		proxy_ajax({
			url: APC.api.v1.dia_diem.url,
			type: AJC.type.post,
			data: {
				du_lieu: params
			}, success: function(resp) {
				$callback(resp);
			}
		});
	};
});

/** Tong quat */

anphatApp.factory('tai_danh_sach', function() {
	return function(params, $callback) {
		auth_get({
      		url: APC.api.v1.tong_quat.url,
      		data: {
				goi_du_lieu: JSON.stringify(params)
			}, success: function(danh_sach) {
        		$callback(danh_sach);
      		}
    	});
	};
});

anphatApp.factory('them_ban_ghi', function() {
	return function(params, $callback) {
		auth_post({
			url: APC.api.v1.tong_quat.url,
			data: {
				goi_du_lieu: JSON.stringify(params)
			}, success: function(ban_ghi) {
				$callback(ban_ghi);
			}
		});
	};
});

anphatApp.factory('xoa_ban_ghi', function() {
	return function(id, params, $callback) {
		auth_del({
			url: APC.api.v1.tong_quat.url + '/' + id,
			data: {
				goi_du_lieu: JSON.stringify(params)
			}, success: function(ban_ghi) {
				$callback(ban_ghi);
			}
		});
	};
});

anphatApp.factory('sua_ban_ghi', function() {
	return function(id, params, $callback) {
		auth_put({
			url: APC.api.v1.tong_quat.url + '/' + id,
			data: {
				goi_du_lieu: JSON.stringify(params)
			}, success: function(ban_ghi) {
				$callback(ban_ghi);
			}
		});
	};
});

anphatApp.factory('loai_thuoc_tinh', function() {
	return function(ma_loai_thuoc_tinh, pham_vi_loai_thuoc_tinh, $callback) {
		auth_get_one('loai_thuoc_tinh', {
			ma_loai_thuoc_tinh: 'tong_quat',
			pham_vi_loai_thuoc_tinh: pham_vi_loai_thuoc_tinh,
			trang_thai: true
		}, function(tong_quat) {
			auth_get_one('loai_thuoc_tinh', {
				ma_loai_thuoc_tinh: ma_loai_thuoc_tinh,
				pham_vi_loai_thuoc_tinh: pham_vi_loai_thuoc_tinh,
				trang_thai: true
			}, function(loai_thuoc_tinh) {
				var _ids = [];
				if(tong_quat)
					_ids.push(tong_quat._id.$oid);
				if(loai_thuoc_tinh)
					_ids.push(loai_thuoc_tinh._id.$oid);
				if(_ids.length) {
					auth_get_many('loai_thuoc_tinh_tham_so', {
						trang_thai: true,
						id_loai_thuoc_tinh: {
							'$in': _ids
						}
					}, function(ket_qua) {
						$callback(ket_qua);
					});
				} else {
					$callback(null);
				}
				
			});
		});
	};
});

anphatApp.factory('lap_chi_muc', function() {
	return function($callback) {
		auth_get({
			url: APC.api.v1.index_du_lieu.url + '/lap_chi_muc',
			data: {}, success: function(ban_ghi) {
				$callback(ban_ghi);
			}
		});
	};
});