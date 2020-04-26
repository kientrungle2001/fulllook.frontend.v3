<?php 
/** @var MY_Controller $controller */
$return = false;
$cache = false;
$key = 'left_sidebar';
$controller->view('left', $data, $return, $cache, $language.$key);?>
<div id="right">
	<?php $controller->view('slide/home_slideshow', $data, $return, $cache, $language.'home_slideshow');?>
	<h1 id="home_h1" class="text-center">MOBO cung cấp dây cáp điện thiết bị điện thiết bị chiếu sáng toàn quốc</h1>
	<?php $controller->view('category/category_products_1', $data, $return, $cache, $language.'category_products_1');?>
	<?php $controller->view('category/category_products_2', $data, $return, $cache, $language.'category_products_2');?>
	<?php $controller->view('category/category_products_3', $data, $return, $cache, $language.'category_products_3');?>
	<?php $controller->view('category/category_products_4', $data, $return, $cache, $language.'category_products_4');?>
	<?php $controller->view('news/home_news', $data, $return, $cache, $language.'home_news');?>
</div>