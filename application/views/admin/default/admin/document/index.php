<?php $filters = $controller->filterFields; ?>

<div class="container-fluid" ng-controller="adminGridController">
	<div class="row mt-2">
		<!-- Left Sidebar -->
		<div class="col-md-6">
			<?php $controller->view('admin/component/sort');?>
			<?php $controller->view('admin/component/filter');?>
			<?php $controller->view('admin/component/update');?>
		</div>
		<!-- End Left Sidebar -->

		<!-- Grid -->
		<div class="col-md-18">
			<div class="card">
				<div class="card-header bg-success text-white">Quản trị danh mục</div>
				<div class="card-body">
				<?php $controller->view('admin/document/grid');?>
				</div>
			</div>
		</div>
		<!-- End Grid -->

	</div>
</div>
<script>
pagination_enabled = true;
multiple_values_enabled = true;
sorting_enabled = true;
filtering_enabled = true;
/** Grid Controller */
adminApp.controller('adminGridController', [
	'$scope', function($scope) {
		

			<?php $controller->view('admin/component/js/common')?>
			<?php $controller->view('admin/document/grid', ['is_js' => true])?>
			<?php $controller->view('admin/component/js/pagination')?>
			<?php $controller->view('admin/component/js/sort')?>
			<?php $controller->view('admin/component/js/filter')?>
			
			$scope.is_true = function(v) {
				if(v !== '0' && v !== 0 && v !== false) {
					return true;
				}
				return false;
			}
			$scope.load();
	}
]);
/** End Grid Controller */



</script>

<style>
	.row-img-fluid {
		text-align: justify;
	}
	.row-img-fluid img {
		max-width: 100%;
		height: auto !important;
	}
</style>