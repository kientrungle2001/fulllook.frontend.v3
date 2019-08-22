<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'home/index';
if($_SERVER['HTTP_HOST'] == 'pql.vn' || $_SERVER['HTTP_HOST'] == 'pql.nn-center.com'
		|| $_SERVER['HTTP_HOST'] == 'mobo.com.vn' || $_SERVER['HTTP_HOST'] == 'www.mobo.com.vn') {
	
	# home
	$route['en'] = 'home/index/en';
	$route['vi'] = 'home/index/vi';
	
	# category
	$route['san-pham/[\w\d-_]+-c(:num)'] = 'product/category/vi/$1';
	$route['en/san-pham/[\w\d-_]+-c(:num)'] = 'product/category/en/$1';
	# short
	$route['[\w\d-_]+-cp(:num)'] = 'product/category/vi/$1';
	$route['en/[\w\d-_]+-cp(:num)'] = 'product/category/en/$1';
	
	# product
	$route['san-pham/[\w\d-_]+-c(:num)/[\w\d-_]+-p(:num).html'] = 'product/detail/vi/$1/$2';
	$route['en/san-pham/[\w\d-_]+-c(:num)/[\w\d-_]+-p(:num).html'] = 'product/detail/en/$1/$2';
	# short
	$route['[\w\d-_]+-cp(:num)-p(:num).html'] = 'product/detail/vi/$1/$2';
	$route['en/[\w\d-_]+-cp(:num)-p(:num).html'] = 'product/detail/en/$1/$2';

	# product feed
	$route['[\w\d-_]+-cp(:num)/feed'] = 'product/feed/vi/$1';
	$route['en/[\w\d-_]+-cp(:num)/feed'] = 'product/feed/en/$1';

	# news
	$route['tin-tuc'] = 'news/category/vi/170';
	$route['en/tin-tuc'] = 'news/category/en/170';
	
	# contact
	$route['lien-he'] = 'contact/index/vi';
	$route['en/lien-he'] = 'contact/index/en';
	
	# news category
	$route['tin-tuc/[\w\d-_]+-c(:num)'] = 'news/category/vi/$1';
	$route['en/tin-tuc/[\w\d-_]+-c(:num)'] = 'news/category/en/$1';
	#short
	$route['[\w\d-_]+-cn(:num)'] = 'news/category/vi/$1';
	$route['en/[\w\d-_]+-cn(:num)'] = 'news/category/en/$1';
	
	# news detail
	$route['tin-tuc/[\w\d-_]+-c(:num)/[\w\d-_]+-n(:num).html'] = 'news/detail/vi/$1/$2';
	$route['en/tin-tuc/[\w\d-_]+-c(:num)/[\w\d-_]+-n(:num).html'] = 'news/detail/en/$1/$2';
	# short
	$route['[\w\d-_]+-cn(:num)-n(:num).html'] = 'news/detail/vi/$1/$2';
	$route['en/[\w\d-_]+-cn(:num)-n(:num).html'] = 'news/detail/en/$1/$2';

	# news feed
	$route['[\w\d-_]+-cn(:num)/feed'] = 'news/feed/vi/$1';
	$route['en/[\w\d-_]+-cn(:num)/feed'] = 'news/feed/en/$1';

	# search
	$route['tim-kiem'] = 'search/result/vi';
	$route['en/tim-kiem'] = 'search/result/en';
}