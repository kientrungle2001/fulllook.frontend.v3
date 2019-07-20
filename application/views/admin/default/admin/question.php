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
				<div class="card-header bg-success text-white">Quản trị câu hỏi</div>
				<div class="card-body">
				<?php $controller->view('admin/question/grid');?>
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
			$scope.filters = <?php echo json_encode($filters)?>;
			$scope.pageSizes = [10, 20, 30, 50, 100, 200];
			$scope.pageSize = 20;
			$scope.pageNum = 0;
			$scope.reload = function() {
				$scope.load();
			};
			$scope.remove = function(item) {
				if(confirm('Bạn có muốn xóa câu hỏi này không?')) {
					$scope._remove(item.id, function() {
						$scope.reload();
					});
					
				}
			};
			$scope._remove = function(id, callback) {
				console.log(id);
			};

			$scope.sort = 'questions.id desc';
				$scope.sortBys = [
					{value: 'questions.id desc', label: 'ID giảm'},
					{value: 'questions.id asc', label: 'ID tăng'},
					{value: 'questions.ordering desc', label: 'Thứ tự giảm'},
					{value: 'questions.ordering asc', label: 'Thư tự tăng'}
				];
				$scope.sortFields = [
					{index: 'questions.id', alias: 'id', label: 'ID'},
					{index: 'questions.ordering', alias: 'ordering', label: 'Thứ tự'},
					{index: 'questions.questionType', alias: 'questionType', label: 'Loại câu hỏi'},
					{index: 'questions.name', alias: 'name', label: 'Nội dung'},
				];			

			
			<?php $controller->view('admin/component/js/grid/question')?>
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