<?php 
/** @var MY_Controller $controller */
$return = false;
$cache = false;
$key = 'left_sidebar';
$controller->view('left', $data, $return, $cache, $language.$key);?>
<div id="right">
	<?php $controller->view('cart/index', $data, $return, $cache, $language.'cart_index');?>
</div>