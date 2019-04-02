FL_API_URL = 'http://api2.nextnobels.com';

$langMap = {
	en: {
		'Class': 'Class'
	},
	vn: {
		'Class': 'Lớp',
		'Practice': 'Luyện tập',
		'Vocabulary': 'Từ vựng'
	}
};
flApp = angular.module('flApp', ["ngSanitize", "ngJaxBind"]);

flApp.filter('sanitizer', ['$sce', function ($sce) {
	return function (url) {
		return $sce.trustAsHtml(url);
	};
}]);
flApp.filter('translate', ['$sce', function ($sce) {
	return function (str) {
		if (str) {
			return $sce.trustAsHtml(str.replace(/\[start\](.*)\[end\]/g, '<button class="btn btn-primary" data-toggle="collapse" onclick="jQuery(this).next().collapse(\'toggle\')">Dịch</button><div class="collapse"><div class="card card-body">$1</div></div>'))
		};
		return '';
	};
}]);

flApp.filter('repeat', ['$sce', function ($sce) {
	return function (number, str) {
		return number ? str.repeat(number) : '';
	};
}]);

flApp.filter('gift', ['$sce', function ($sce) {
	return function (str) {
		if (str) {
			var result = '';
			var strs = str.split('=====');
			result += strs[0];
			if (typeof strs[1] !== 'undefined') {
				result += '<button class="btn btn-primary" data-toggle="collapse" onclick="jQuery(this).next().collapse(\'toggle\')">Lyrics</button><div class="collapse"><div class="card card-body">' + strs[1] + '</div></div>';
			}
			if (typeof strs[2] !== 'undefined') {
				result += '<div><strong>Questions:</strong> ' + strs[2] + '</div>';
			}
			return $sce.trustAsHtml(result);
		};

		return '';
	};
}]);
flApp.filter('toDate', function () {
	return function (input) {
		return new Date(input);
	}
});

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