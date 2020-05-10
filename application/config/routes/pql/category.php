<?php
$route['san-pham/[\w\d\-_]+\-c(:num)'] = 'product/category/vi/$1';
$route['en/san-pham/[\w\d\-_]+\-c(:num)'] = 'product/category/en/$1';
$route['san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)'] = 'product/category/vi/$1/$2';
$route['en/san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)'] = 'product/category/en/$1/$2';
$route['san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)'] = 'product/category/vi/$1/$2/$3';
$route['en/san-pham/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)/[\w\d\-_]+\-c(:num)'] = 'product/category/en/$1/$2/$3';
# short
$route['[\w\d\-_]+\-cp(:num)'] = 'product/category/vi/$1';
$route['en/[\w\d\-_]+\-cp(:num)'] = 'product/category/en/$1';
# category without id
$route['([\w\d\-_]+)'] = 'product/category_slug/vi/$1';
$route['en/([\w\d\-_]+)'] = 'product/category_slug/en/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/vi/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/en/$2/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/vi/$3/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/en/$3/$2/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/vi/$4/$3/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)'] = 'product/category_slug/en/$4/$3/$2/$1';
# category without id with html
$route['([\w\d\-_]+)\.html'] = 'product/category_slug/vi/$1';
$route['en/([\w\d\-_]+)\.html'] = 'product/category_slug/en/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/vi/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/en/$2/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/vi/$3/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/en/$3/$2/$1';
$route['([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/vi/$4/$3/$2/$1';
$route['en/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)/([\w\d\-_]+)\.html'] = 'product/category_slug/en/$4/$3/$2/$1';
# short with html
$route['[\w\d\-_]+\-cp(:num).html'] = 'product/category/vi/$1';
$route['en/[\w\d\-_]+\-cp(:num).html'] = 'product/category/en/$1';
$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/vi/$2/$1';
$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/en/$2/$1';
$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/vi/$3/$2/$1';
$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/en/$3/$2/$1';
$route['[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/vi/$4/$3/$2/$1';
$route['en/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num)/[\w\d\-_]+\-cp(:num).html'] = 'product/category/en/$4/$3/$2/$1';