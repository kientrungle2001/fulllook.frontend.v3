<?php $controller->js('controller/image.js');?>
<div class="container" ng-controller="image_controller">
	<div class="row">
		<div class="col-md-10" id="main-content">
		<?php $controller->view('article/content', $data); ?>
		</div>
		<div class="col-md-2" id="sidebar">
			<?php $controller->view('page/sidebar', $data); ?>
		</div>
	</div>

	<hr class="hr-separator" />

	<div class="row">
		<div class="col-xs-12">
			<?php $controller->view('home/tintuc360', $data);?>
		</div>
	</div>
</div>

<script>
	$(function() {
		$("img").on("error", function () {
			$(this).unbind("error").attr("src", "http://phattrienngonngu.com/web/images/logo.png");
		});
	});
</script>