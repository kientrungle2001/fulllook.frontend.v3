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

anphatApp.filter('vn_date_format', function() {
	return function (input) {
		var input_time = parseInt(input);
		var d = new Date(input_time * 1000);
		return d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
	};
});

anphatApp.filter('vn_datetime_format', function() {
	return function (input) {
		var input_time = parseInt(input);
		var d = new Date(input_time * 1000);
		return d.getHours() + ':' + d.getMinutes() + ' '+ d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear();
	};
});