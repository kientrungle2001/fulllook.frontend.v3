<?php
	# news category
	$route['tin\-tuc/[\w\d\-_]+\-c(:num)'] = 'news/category/vi/$1';
  $route['en/tin\-tuc/[\w\d\-_]+\-c(:num)'] = 'news/category/en/$1';
  
	#short
	$route['[\w\d\-_]+\-cn(:num)'] = 'news/category/vi/$1';
	$route['en/[\w\d\-_]+\-cn(:num)'] = 'news/category/en/$1';
	#short with html
	$route['[\w\d\-_]+\-cn(:num).html'] = 'news/category/vi/$1';
	$route['en/[\w\d\-_]+\-cn(:num).html'] = 'news/category/en/$1';
	
	# news detail
	$route['tin\-tuc/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-n(:num).html'] = 'news/detail/vi/$1/$2';
	$route['en/tin\-tuc/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-n(:num).html'] = 'news/detail/en/$1/$2';
	# short
	$route['[\w\d\-_]+-cn(:num)-n(:num).html'] = 'news/detail/vi/$1/$2';
	$route['en/[\w\d\-_]+-cn(:num)-n(:num).html'] = 'news/detail/en/$1/$2';

	# news feed
	$route['[\w\d\-_]+-cn(:num)/feed'] = 'news/feed/vi/$1';
	$route['en/[\w\d\-_]+-cn(:num)/feed'] = 'news/feed/en/$1';
	# news feed with html
	$route['[\w\d\-_]+-cn(:num).html/feed'] = 'news/feed/vi/$1';
	$route['en/[\w\d\-_]+-cn(:num).html/feed'] = 'news/feed/en/$1';
