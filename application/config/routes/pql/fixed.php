<?php
  $route['tin-tuc'] = 'news/category/vi/170';
	$route['en/tin-tuc'] = 'news/category/en/170';
	
	# contact
	$route['lien-he'] = 'contact/index/vi';
	$route['en/lien-he'] = 'contact/index/en';
	
	$route['(gioi-thieu|bang-gia|chinh-sach|tuyen-dung|tin-tuc)\.html'] = 'news/category_slug/vi/$1';
	$route['en/(gioi-thieu|bang-gia|chinh-sach|tuyen-dung|tin-tuc)\.html'] = 'news/category_slug/en/$1';

	$route['(gioi-thieu|bang-gia|chinh-sach|tuyen-dung|tin-tuc)/([\w\d\-_]+)\.html'] = 'news/detail_slug/vi/$1/$2';
	$route['en/(gioi-thieu|bang-gia|chinh-sach|tuyen-dung|tin-tuc)/([\w\d\-_]+)\.html'] = 'news/detail_slug/en/$1/$2';