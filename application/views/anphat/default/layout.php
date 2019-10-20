<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>An Phát CRM</title>
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
	<?php $controller->js_libraries(); ?>

	<?php
	$controller->js('array.js');
	$controller->js('constants.js');
	$controller->js('app.js');
	$controller->js('controller/login.js');
	?>
</head>

<body class="<?php echo $controller->router->fetch_class();?>-page" ng-app="anphatApp">
	<div ng-controller="loginController">
		<?php $controller->view('page/header', $data);?>
		<?php $controller->view($view, $data);?>
		<?php $controller->view('page/footer', $data);?>
	</div>
</body>

</html>