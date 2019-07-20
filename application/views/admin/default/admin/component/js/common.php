$scope.filter_data = {};
$scope.filters = <?php echo json_encode($controller->filterFields)?>;
<?php if(isset($controller->request_filters)):?>
	<?php foreach($controller->request_filters as $field):?>
		<?php if(isset($request_filters[$field['index']])):?>
			$scope.filter_data.<?= $field['index']?> = <?php echo json_encode($request_filters[$field['index']]);?>;
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>

$scope.pageSizes = <?php echo json_encode($controller->pageSizes);?>;
$scope.pageSize = <?= $controller->pageSize?>;
$scope.pageNum = <?= $controller->pageNum?>;
$scope.sort = <?= json_encode($controller->sort)?>;
$scope.sortBys = <?= json_encode($controller->sortBys)?>;
$scope.sortFields = <?= json_encode($controller->sortFields)?>;
$scope.reload = function() { $scope.load(); };
$scope.remove = function(item) {
	if(confirm('Bạn có muốn xóa câu hỏi này không?')) {
		$scope._remove(item.id, function() {
			$scope.reload();
		});
	}
};
$scope._remove = function(id, callback) { 
	 var module = '<?= $controller->uri->segment(2)?>';
		$.ajax({
			url: '/api/admin/'+module+'/remove/' + module + '/' + id,
			dataType: 'json', type: 'post',
			data: {id: id},
			success: function(resp) {
				if(typeof callback != 'undefined') callback();
			}
		});
};
$scope.grid_check = {};
$scope.removeSelecteds = function() {
	if(confirm('Bạn có muốn xóa các bản ghi đã chọn?')) {
		for(var id in $scope.grid_check) {
			if($scope.grid_check[id]) {
				$scope._remove(id, function() {
					$scope.reload();		
				});
			}
		}
		setTimeout(function() {
			$scope.grid_check = {};
		}, 2000);
	}
	
};

$scope.add_items = [{}];

$scope.add_row = function() {
	$scope.add_items.push({});
};

$scope.remove_row = function(index) {
	$scope.add_items.splice(index, 1);
};

$scope.add = function() {
	$scope.add_items = [{}];
};