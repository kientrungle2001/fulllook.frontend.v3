<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>QLHS V3</title>
	<script>
	serverTime = <?php echo time() ?>;
	setInterval(function() {
		serverTime++;
	}, 1000);
	</script>

	<?php
	$controller->css_libraries();
	$controller->css('style.css');
?>
	<?php $c->js_libraries(); ?>

	<?php
	$c->js('array.js');
	$c->js('constants.js');
	$c->js('app.js');
	$c->js('controller/login.js');
	
	?>
</head>

<body class="<?php echo $c->router->fetch_class();?>-page" ng-app="qlhsApp">
	<div ng-controller="loginController">
		<?php $c->view('page/header', $data);?>
		<?php $c->view($view, $data);?>
		<?php $c->view('page/footer', $data);?>
	</div>
</body>

</html>