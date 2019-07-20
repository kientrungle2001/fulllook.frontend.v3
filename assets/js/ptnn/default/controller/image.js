ptnnApp.controller('image_controller', [
	'$scope', function($scope) {
		$scope.getImage = function(txt) {
			if(null === txt) return '';
			var m = txt.match(/src="([^"]+)"/);
			if(null === m) return '';
			if(typeof m !== 'undefined' && typeof m[1] != 'undefined') {
				return $scope.formatImage(m[1]);
			}
			return '';
		};
		$scope.formatImage = function(img) {
			if(null === img) return '';
			if(typeof img == 'undefined') return '';
			if(img.startsWith('http')) {
				return img;
			}
			return 'http://phattrienngonngu.com/web/' + img;
		};
		$scope.replaceImage = function(txt) {
			if(null === txt) return '';
			if(typeof txt == 'undefined') return '';
			return txt.replace(/src="([^":]+)"/g, 'src="http://phattrienngonngu.com/web/$1"');
		};
		$scope.removeImage = function(txt) {
			if(null === txt) return '';
			if(typeof txt == 'undefined') return '';
			return txt.replace(/<img[^>]+>/g, '');
		};
		$scope.stripTags = function(txt) {
			if(null === txt) return '';
			if(typeof txt == 'undefined') return '';
			return txt.replace(/<[^>]+>/g, '');
		};
	}
]);