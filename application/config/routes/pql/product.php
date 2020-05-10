<?php
	#product
	# short html without category id
	$route['([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/vi/$1/$2';
	$route['en/([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/en/$1/$2';
	$route['([\w\d\-_]+)/([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/vi/$2/$3/$1';
	$route['en/([\w\d\-_]+)/([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/en/$2/$3/$1';
	$route['([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/vi/$3/$4/$1/$2';
	$route['en/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/[\w\d\-_]+\-p(:num).html'] = 'product/detail_slug/en/$3/$4/$1/$2';

	
	# product
	$route['san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/vi/$1/$2';
	$route['en/san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/en/$1/$2';
	# short
	$route['[\w\d\-_]+\-cp(:num)\-p(:num).html'] = 'product/detail/vi/$1/$2';
	$route['en/[\w\d\-_]+\-cp(:num)\-p(:num).html'] = 'product/detail/en/$1/$2';
	
	# short html with category
	$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/vi/$1/$2';
	$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/en/$1/$2';
	$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/vi/$2/$3/$1';
	$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/en/$2/$3/$1';
	$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/vi/$3/$4/$1/$2';
	$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-p(:num).html'] = 'product/detail/en/$3/$4/$1/$2';

	# product feed
	$route['[\w\d\-_]+\-cp(:num)/feed'] = 'product/feed/vi/$1';
	$route['en/[\w\d\-_]+\-cp(:num)/feed'] = 'product/feed/en/$1';
	# product feed with html
	$route['[\w\d\-_]+\-cp(:num).html/feed'] = 'product/feed/vi/$1';
	$route['en/[\w\d\-_]+-cp(:num).html/feed'] = 'product/feed/en/$1';
