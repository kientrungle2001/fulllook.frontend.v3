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