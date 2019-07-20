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
	subject_id = '<?php echo intval($controller->input->get('subject_id', true)); ?>';
	topic_id = '<?php echo intval($controller->input->get('topic_id', true)); ?>';
	sub_topic_id = '<?php echo intval($controller->input->get('sub_topic_id', true)); ?>';
	vocabulary_id = '<?php echo intval($controller->input->get('vocabulary_id', true)); ?>;';
	test_id = '<?php echo intval($controller->input->get('test_id', true)); ?>';
	test_set_id = '<?php echo intval($controller->input->get('test_set_id', true)); ?>';
	category_id = '<?php echo intval($controller->input->get('category_id', true)); ?>';
	exercise_number = '<?php echo intval($controller->input->get('exercise_number', true)); ?>';
	serverTime = <?php echo time() ?>;

	sessionUserId = '<?php if(isset($controller->session->userId)) echo $controller->session->userId  ?>';
	sessionUsername = '<?php if(isset($controller->session->username)) echo $controller->session->username  ?>';
	sessionPhone = '<?php if(isset($controller->session->phone)) echo $controller->session->phone  ?>';
	sessionEmail = '<?php if(isset($controller->session->email)) echo $controller->session->email  ?>';
	checkPayment = '<?php if(isset($controller->session->checkPayment)) echo $controller->session->checkPayment ?>';
	paymentDate = '<?php if(isset($controller->session->paymentDate)) echo $controller->session->paymentDate ?>';
	expiredDate = '<?php if(isset($controller->session->expiredDate)) echo $controller->session->expiredDate ?>';

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
	?>
</head>

<body class="<?php echo $controller->router->fetch_class();?>-page" ng-app="ptnnApp">
	<?php $controller->view('page/header', $data);?>
	<?php $controller->view($view, $data);?>
	<?php $controller->view('page/footer', $data);?>
</body>

</html>