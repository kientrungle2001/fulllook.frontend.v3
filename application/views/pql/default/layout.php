<?php defined('BASEPATH') or exit('No direct script access allowed');
/** @var MY_Controller $controller */
/**	@var CI_Router $controller->router */
?><!DOCTYPE html>
<html lang="<?= $language == 'en'? 'en-us':'vi-vn' ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta rel="canonical" href="http://<?= str_replace('www.','',$_SERVER['HTTP_HOST'])?><?= $_SERVER['REQUEST_URI']?>" />
	<link rel="canonical" href="http://<?= str_replace('www.','',$_SERVER['HTTP_HOST'])?><?= $_SERVER['REQUEST_URI']?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $page_title ?></title>
	<meta property="og:type" content="og:article" />
	<meta property="og:image" content="<?= $page_image ?>" />
	<meta property="og:title" content="<?= $page_title?>" />
	<meta property="og:site_name" content="<?= $_SERVER['HTTP_HOST'] ?>" />
	<meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'] ?>/" />
	<meta property="og:description" content="<?= html_escape(strip_tags($page_description)) ?>" />
	<meta name="keywords" content="<?= $page_keywords ?>" />
	<meta name="description" content="<?= html_escape(strip_tags($page_description)) ?>" />
	<script>
		serverTime = <?php echo time() ?>;
		setInterval(function() {
			serverTime++;
		}, 1000);
	</script>

	<?php
	$controller->css_libraries();
	$controller->css('css/style.css');
	$controller->css('css/responsive.css');
	?>
	<?php $controller->js_libraries(); ?>
</head>

<body class="<?php echo $controller->router->fetch_class(); ?>-page" ng-app="adminApp">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=180896868946666&autoLogAppEvents=1"></script>
	<div id="container" ng-controller="loginController">
		<?php $controller->view('page/header', $data); ?>
		<?php $controller->view($view, $data); ?>
		<?php $controller->view('page/footer', $data); ?>
	</div>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '<?= $options_model->get_option_tree('google_analytics_code')?>', 'auto');
	ga('send', 'pageview');
	// UA-63651240-1
	</script>
</body>

</html>