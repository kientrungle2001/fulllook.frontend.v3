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
};

Array.prototype.combine = function(arr) {
	for(var i = 0; i < arr.length; i++) {
		this.push(arr[i]);
	}
	return this;
};