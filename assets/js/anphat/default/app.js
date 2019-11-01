anphatApp = angular.module('anphatApp', ["ngSanitize", "ui.bootstrap", 'ui.tinymce', 'ui.select2']);

/** Filters */
anphatApp.filter('sanitizer', ['$sce', function ($sce) {
	return function (url) {
		return $sce.trustAsHtml(url);
	};
}]);

anphatApp.filter('repeat', ['$sce', function ($sce) {
	return function (number, str) {
		return number ? str.repeat(number) : '';
	};
}]);

anphatApp.filter('toDate', function () {
	return function (input) {
		return new Date(input);
	}
});

/** Factories */

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
		proxy_ajax({
      url: APC.api.v1.tong_quat.url,
			type: AJAX_CONSTANTS.type.get,
			headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Bearer " + localStorage.getItem('bearer_token')
    	},
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
		proxy_ajax({
			url: APC.api.v1.tong_quat.url,
			type: AJC.type.post,
			headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Bearer " + localStorage.getItem('bearer_token')
    	},
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
		proxy_ajax({
			url: APC.api.v1.tong_quat.url + '/' + id,
			type: AJC.type.del,
			headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Bearer " + localStorage.getItem('bearer_token')
    	},
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
		proxy_ajax({
			url: APC.api.v1.tong_quat.url + '/' + id,
			type: AJC.type.put,
			headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Bearer " + localStorage.getItem('bearer_token')
    	},
			data: {
				goi_du_lieu: JSON.stringify(params)
			}, success: function(ban_ghi) {
				$callback(ban_ghi);
			}
		});
	};
});


Array.prototype.pushIfNotExisted = function(item) {
	if(this.indexOf(item) === -1) {
		this.push(item);
	}
};

Array.prototype.forEachNotEmpty = function(callback) {
	
	this.forEach(function(value) {
		if(value !== '') {
			callback(value);
		}
	});
};

Array.prototype.pushIfMatched = function(haystack, id, field) {
	var that = this;
	haystack.forEach(function(item) {
		if(parseInt(item.id) === parseInt(id)) {
			that.push(item[field]);
			return false;
		}
	});
};

Array.prototype.collectIds = function(field) {
	var items = this; var ids = [];
	items.forEach(function(item) {
		if(typeof item[field] == 'string') {
			item[field].split(',').forEachNotEmpty(function(id) {
				ids.pushIfNotExisted(id);
			});
		} else if(typeof item[field] == 'object' && item[field].constructor.name == 'Array') {
			item[field].forEach(function(id) {
				ids.pushIfNotExisted(id);
			});
		} else {
			ids.pushIfNotExisted(item[field]);
		}
	});
	return ids;
};

Array.prototype.joinField = function(ids, field) {
	var items = this;
	var values = [];
	if(typeof ids == 'string') {
		ids.split(',').forEachNotEmpty(function(id) {
			values.pushIfMatched(items, id, field);
		});
	} else if(typeof ids == 'object' && ids.constructor.name == 'Array') {
		ids.forEach(function(id) {
			values.pushIfMatched(items, id, field);
		});
	} else {
		values.pushIfMatched(items, ids, field);
	}
	
	return values.join(', ');
}

Array.prototype.indexOfMatched = function(str) {
	for(var i = 0; i < this.length; i++) {
		if(''+this[i] == '' + str) {
			return i;
		}
	}
	return -1;
};

String.prototype.indexOfMatched = function(str) {
	return this.indexOf(''+str);
}

function get_browser() {
	var browser = '';
		if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
			browser = 'Opera';
		}
		else if (navigator.userAgent.indexOf("Chrome") != -1) {
			browser = 'Chrome';
		}
		else if (navigator.userAgent.indexOf("Safari") != -1) {
			browser = 'Safari';
		}
		else if (navigator.userAgent.indexOf("Firefox") != -1) {
			browser = 'Firefox';
		}
		else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
		{
			browser = 'IE';
		}
		else {
			browser = 'unknown';
		}

		return browser;
}

function get_os() {
	var OSName = "Unknown";
	if (window.navigator.userAgent.indexOf("Windows NT 10.0") != -1) OSName = "Windows 10";
	if (window.navigator.userAgent.indexOf("Windows NT 6.2") != -1) OSName = "Windows 8";
	if (window.navigator.userAgent.indexOf("Windows NT 6.1") != -1) OSName = "Windows 7";
	if (window.navigator.userAgent.indexOf("Windows NT 6.0") != -1) OSName = "Windows Vista";
	if (window.navigator.userAgent.indexOf("Windows NT 5.1") != -1) OSName = "Windows XP";
	if (window.navigator.userAgent.indexOf("Windows NT 5.0") != -1) OSName = "Windows 2000";
	if (window.navigator.userAgent.indexOf("Mac") != -1) OSName = "Mac/iOS";
	if (window.navigator.userAgent.indexOf("X11") != -1) OSName = "UNIX";
	if (window.navigator.userAgent.indexOf("Linux") != -1) OSName = "Linux";
	return OSName;
}


cacheStorage = {
	getItem: function(key) {
		this._checkTimeout();
		return this._getItem(key);
	},
	setItem: function(key, value) {
		this._checkTimeout();
		var all_item_keys = this._getItem('all_item_keys');
		if(null === all_item_keys) all_item_keys = [];
		if(all_item_keys.indexOf(key) === -1) {
			all_item_keys.push(key);
		}
		this._setItem('all_item_keys', all_item_keys);
		return this._setItem(key, value);
	},
	removeItem: function(key) {
		this._checkTimeout();
		var all_item_keys = this._getItem('all_item_keys');
		if(null === all_item_keys) all_item_keys = [];
		var index_of_key = all_item_keys.indexOf(key);
		if(index_of_key !== -1) {
			all_item_keys.splice(index_of_key, 1);
		}
		this._setItem('all_item_keys', all_item_keys);
		return this._removeItem(key);
	},
	clear: function() {
		var that = this;
		var all_item_keys = this._getItem('all_item_keys');
		if(null !== all_item_keys) {
			all_item_keys.forEach(function(key) {
				that._removeItem(key);
			});
		}
		this._removeItem('all_item_keys');
	},
	_getItem: function(key) {
		var value = localStorage.getItem(key);
		if(null === value) return null;
		return JSON.parse(value);
	},
	_setItem: function(key, value) {
		var storeValue = JSON.stringify(value);
		return localStorage.setItem(key, storeValue);
	},
	_removeItem: function(key) {
		return localStorage.removeItem(key);
	},
	_checkTimeout: function() {
		var time_all_item_keys = this._getItem('time_all_item_keys');
		var current_time = (new Date()).getTime();
		if(!time_all_item_keys) {
			time_all_item_keys = current_time;
		}
		if(current_time - time_all_item_keys > 30 * 60 * 1000) {
			// timeout
			this.clear();
		}
	}
}
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

function proxy_get(options) {
	options.type = 'get';
	return proxy_ajax(options);
}

function proxy_post(options) {
	options.type = 'post';
	return proxy_ajax(options);
}