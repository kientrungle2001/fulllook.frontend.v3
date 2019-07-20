<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Trang chủ</title>
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
	<script type="text/javascript">
	(function(ng) {
		'use strict';
		var app = angular.module('ngJaxBind', []);

		app.directive("mathjaxBind", function() {
			return {
				restrict: "A",
				controller: ["$scope", "$element", "$attrs",
					function($scope, $element, $attrs) {
						$scope.$watch($attrs.mathjaxBind, function(texExpression) {
							$element.html(texExpression);
							if (typeof MathJax != 'undefined') {
								MathJax.Hub.Queue(["Typeset", MathJax.Hub, $element[0]]);
							}
						});
					}
				]
			};
		});
	}(angular));
	</script>
	<script type="text/x-mathjax-config">
		MathJax.Hub.Config({
			skipStartupTypeset: true,
   messageStyle: "none",
			showMathMenu: false,
			showProcessingMessages: false,
			jax: ["input/TeX", "output/HTML-CSS"],
			tex2jax: {
				inlineMath: [['[\/','\/]'], ['\\(','\\)']],
				preview: "none"
			}
		}); 
		MathJax.Hub.Configured();
	</script>
	<?php
	$controller->js('array.js');
	$controller->js('app.js');
	$controller->js('controller/login.js');
	?>
</head>

<body class="<?php echo $controller->router->fetch_class();?>-page" ng-app="adminApp">
	<div ng-controller="loginController">
		<?php $controller->view('page/header', $data);?>
		<?php $controller->view($view, $data);?>
		<?php $controller->view('page/footer', $data);?>
	</div>
</body>

</html>