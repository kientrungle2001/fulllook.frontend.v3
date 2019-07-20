<?php if(0):?>
<script>
<?php endif; ?>
// Lọc
if(window.filtering_enabled) {

	// Bật tắt giá trị filter cho dạng status
	$scope.toggleFilterStatus = function(field) {
		if(typeof $scope.filter_data[field] == 'undefined' || $scope.filter_data[field] === null) {
			$scope.filter_data[field] = 1;
		} else if($scope.filter_data[field] === 1) {
			$scope.filter_data[field] = 0;
		} else {
			$scope.filter_data[field] = null;
		}
	};

	// lấy label theo giá trị của trường
	$scope.getFilterStatusLabel = function(field) {
		if(typeof $scope.filter_data[field] == 'undefined' || $scope.filter_data[field] === null) {
			return 'N/A';
		} else if($scope.filter_data[field] === 1) {
			return 'ON';
		} else {
			return 'OFF';
		}
	};

	// Bật tắt giá trị filter cho dạng multiselect
	$scope.toggleFilterMultiselect = function(field, value) {
		if(typeof $scope.filter_data[field] == 'undefined' || $scope.filter_data[field] === null) {
			$scope.filter_data[field] = [];
		}
		var index = $scope.filter_data[field].indexOf(value);
		if(index == -1) {
			$scope.filter_data[field].push(value);
		} else {
			$scope.filter_data[field].splice(index, 1);
		}
	};

	// Có value trong trường multiselect
	$scope.hasFilterMultiselect = function(field, value) {
		if(typeof $scope.filter_data[field] == 'undefined' || $scope.filter_data[field] === null) {
			$scope.filter_data[field] = [];
		}
		var index = $scope.filter_data[field].indexOf(value);
		if(index == -1) {
			return false;
		} else {
			return true;
		}
	};

	
	// load dữ liệu khi bấm vào nút mở dialog
	$scope.filter_loadeds = {};
	$scope.load_filter_select = function(settings) {
		// nếu settings là chuỗi tên trường
		if(typeof settings == 'string') {
			for(var i = 0; i < $scope.filters.length; i++) {
				if($scope.filters[i].index === settings) {
					return $scope.load_filter_select($scope.filters[i]);
				}
			}
			return null;
		}
		// bật dialog lên
		$('#modal-'+settings.index).modal('show');
		
		// nếu dữ liệu đã tải rồi
		if(typeof $scope.filter_loadeds[settings.index] !== 'undefined') return true;
		
		// nếu có trường table trong settings thì mới gọi ajax
		if(typeof settings.table !== 'undefined') {
			$.ajax({
				url: '/api/admin/'+(settings.controller || settings.table)+'/items/' + settings.table,
				data: settings, dataType: 'json',
				success: function(result) {
					$scope['filter_select_'+ settings.index] = result.rows;
					$scope.$apply();
				}
			});
		}
		
		$scope.filter_loadeds[settings.index] = true;
	};

<?php
// Nếu dữ liệu dạng json thì lấy luôn từ database
if(isset($controller->filterFields)) {
	foreach($controller->filterFields as $index => $field) { 
		if(strpos($field['type'], 'json') !== false) {
			$setting = $field;
			if(isset($setting['table'])) {

				if(!isset($setting['fields'])) $setting['fields'] = '*';
				$controller->db->select($setting['fields']);
				if(isset($setting['where']))
					$controller->db->where($setting['where']);
				if(isset($setting['sort']))
				$controller->db->order_by($setting['sort']);
				$items = $controller->db->get($setting['table'])->result_array();
				?>
				$scope.filter_select_<?= $setting['index']?> = <?= json_encode($items);?>;
				<?php
			}	
		} else if(strpos($field['type'], 'ajax') !== false) { ?>
			//$scope.load_filter_select(<?php echo json_encode($field)?>);
		
		<?php }
	}
}
?>
}
// Kết thúc lọc
<?php if(0):?>
</script>
<?php endif;?>