PROXY_URL = '//' + location.host + '/proxy.php';
PROXY_ENABLED = false;
function proxy_ajax(options) {
	if(PROXY_ENABLED) {
		options.url = PROXY_URL + '?_real_url=' + encodeURIComponent(options.url);
		options.data = options.data || {};
		options.data['data'] = $.extend({}, options.data);
		options.data['method'] = options.type || 'get';
		options.type = 'post';
		options.dataType = 'json';
	}
	return $.ajax(options);
}

function auth_ajax(options) {
	options.headers = {
		"Content-Type": "application/x-www-form-urlencoded",
		"Authorization": "Bearer " + localStorage.getItem('bearer_token')
	};
	return proxy_ajax(options);
}

function auth_get(options) {
	options.type = 'get';
	auth_ajax(options);
}

function auth_post(options) {
	options.type = 'post';
	auth_ajax(options);
}

function auth_put(options) {
	options.type = 'put';
	auth_ajax(options);
}

function auth_del(options) {
	options.type = 'delete';
	auth_ajax(options);
}

function proxy_get(options) {
	options.type = 'get';
	return proxy_ajax(options);
}

function proxy_post(options) {
	options.type = 'post';
	return proxy_ajax(options);
}

function proxy_put(options) {
	options.type = 'put';
	return proxy_ajax(options);
}

function proxy_del(options) {
	options.type = 'delete';
	return proxy_ajax(options);
}

function auth_get_many(ten_bang, dieu_kien, $callback) {
	auth_get({
		url: AP_API.tong_quat.url,
		data: {
			goi_du_lieu: JSON.stringify({
				ten_bang: ten_bang,
				dieu_kien: dieu_kien,
				kich_co_trang: 1000,
				trang_hien_thoi: 0
			})
		},
		success: function(ket_qua) {
			$callback(ket_qua.du_lieu);
		}
	});
}

function auth_get_one(ten_bang, dieu_kien, $callback) {
	auth_get({
		url: AP_API.tong_quat.url,
		data: {
			goi_du_lieu: JSON.stringify({
				ten_bang: ten_bang,
				dieu_kien: dieu_kien,
				kich_co_trang: 1,
				trang_hien_thoi: 0
			})
		},
		success: function(ket_qua) {
			$callback(ket_qua.du_lieu[0] || null);
		}
	});
}