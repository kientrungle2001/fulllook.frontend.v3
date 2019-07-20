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
adminApp = angular.module('adminApp', ["ngSanitize", "ngJaxBind", "ui.bootstrap", 'ui.tinymce', 'ui.select2']);

adminApp.filter('sanitizer', ['$sce', function ($sce) {
	return function (url) {
		return $sce.trustAsHtml(url);
	};
}]);
adminApp.filter('translate', ['$sce', function ($sce) {
	return function (str) {
		if (str) {
			return $sce.trustAsHtml(str.replace(/\[start\](.*)\[end\]/g, '<button class="btn btn-primary" data-toggle="collapse" onclick="jQuery(this).next().collapse(\'toggle\')">Dịch</button><div class="collapse"><div class="card card-body">$1</div></div>'))
		};
		return '';
	};
}]);

adminApp.filter('repeat', ['$sce', function ($sce) {
	return function (number, str) {
		return number ? str.repeat(number) : '';
	};
}]);

adminApp.filter('gift', ['$sce', function ($sce) {
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
adminApp.filter('toDate', function () {
	return function (input) {
		return new Date(input);
	}
});
adminApp.directive('testBlock', function() {
	return {
		restrict: 'EA',
		template: function(elem, attr) {
			return `<a href="/test/detail?test_id={{test.id}}&category_id=`+attr.categoryId+`">
			<div class="section-button">{{translate(test, 'test.name')}}
			<span ng-show="test.trial==1" class="badge-free">Free</span>
			</div>
		</a>`;
		}
	};
});

adminApp.directive('sectionTitle', function() {
	return {
		restrict: 'EA',
		transclude: true,
		template: function(elem, attr) {
			return `<div class="section-title">
			<ng-transclude></ng-transclude>
			</div>`;
		}
	};
});

adminApp.filter('classes_filter', function() {
	return function(str) {
		if(typeof str == 'string')
		return str.replace(/^,/,'').replace(/,$/, '');
		return str.join(', ');
	}
});
function table_ajax(table, data, success, url) {
	if(typeof url === 'undefined') {
		url = '/api/table/items/' + table;
	}
	return $.ajax({
		url: url,
		dataType: 'json',
		data: data,
		success: success
	});
};

function categories_ajax_set(categoryIds, success) {
	if(categoryIds.length > 0)
		return categories_ajax({where: {id: categoryIds}, select: 'id,name', pageSize: 100}, success);
}

function categories_ajax(data, success) {
	return table_ajax('categories', data, success, '/api/admin/category/items/categories');
}

function tests_ajax_set(testIds, success) {
	if(testIds.length > 0)
		return tests_ajax({where: {id: testIds}, select: 'id,name', pageSize: 100}, success);
}

function tests_ajax(data, success) {
	return table_ajax('tests', data, success, '/api/admin/test/items/tests');
}

function questions_ajax(data, success) {
	return table_ajax('questions', data, success, '/api/admin/question/items/questions');
}

function teachers_ajax_set(teacherIds, success) {
	if(teacherIds.length > 0)
		return teachers_ajax({where: {id: teacherIds}, select: 'id,name', pageSize: 100}, success);
}

function teachers_ajax(data, success) {
	return table_ajax('admin', data, success, '/api/admin/admin/items/admin');
}

function users_ajax_set(userIds, success) {
	if(userIds.length > 0)
		return users_ajax({where: {id: userIds}, select: 'id,name', pageSize: 100}, success);
}

function users_ajax(data, success) {
	return table_ajax('user', data, success, '/api/admin/user/items/user');
}

function documents_ajax_set(documentIds, success) {
	if(documentIds.length > 0)
		return documents_ajax({where: {id: documentIds}, select: 'id,name', pageSize: 100}, success);
}

function documents_ajax(data, success) {
	return table_ajax('document', data, success, '/api/admin/document/items/document');
}

function news_ajax_set(newsIds, success) {
	if(newsIds.length > 0)
		return news_ajax({where: {id: newsIds}, select: 'id,name', pageSize: 100}, success);
}

function news_ajax(data, success) {
	return table_ajax('news', data, success, '/api/admin/news/items/news');
}

function table_api_ajax_set(ids, success) {
	if(ids.length > 0)
		return table_api_ajax({where: {id: ids}, select: 'id,name', pageSize: 100}, success);
}

function table_api_ajax(url, data, success) {
	return table_ajax(null, data, success, url);
}

function errors_ajax(data, success) {
	return table_ajax('question_error', data, success, '/api/admin/errors/items/question_error');
}

function configs_ajax(data, success) {
	return table_ajax('config', data, success, '/api/admin/config/items/config');
}

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
PROXY_ENABLED = true;
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