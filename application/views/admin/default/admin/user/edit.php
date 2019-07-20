<div class="container-fluid" ng-controller="adminEditController">
	<h1>Sửa người dùng <a class="small" href="/admin/user">Quay lại</a></h1>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	<?php
	if(isset($controller->edits)) {
		foreach($controller->edits as $index => $edit) { ?>
			<li class="nav-item">
					<a class="nav-link <?= ($index == 0 ? 'active': '')?>" 
							data-toggle="tab" href="#tab-<?= $edit['index']?>"><?= $edit['label']?></a>
			</li>
		<?php 
		}
	}
	?>
	</ul>
	<!-- Tab panes -->
<div class="tab-content">
<?php
	if(isset($controller->edits)) {
		foreach($controller->edits as $index => $edit) { ?>
  <div class="tab-pane <?= ($index == 0 ? 'active': '')?>" id="tab-<?= $edit['index']?>">
			<div class="row">
				<?php 
				if(isset($edit['fields']))
				foreach($edit['fields'] as $field) { ?>
					<div class="col-md-<?= isset($field['md']) ? $field['md']: 2?>">
						<?php $controller->view('admin/edit/' . $field['type'], ['setting' => $field])?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php 
		}
	}
	?>
</div>
<!-- End Tab Panes -->

<div class="row">
	<div class="col-md-2">
		<button ng-click="save()" class="btn btn-primary">Cập nhật</button>
	</div>
</div>
	<hr />
	<div class="row">
		<div class="col-md-24" ng-repeat="(key, value) in mvalue">
				<strong>{{key}}</strong>: {{value}}<br />
		</div>
	</div>
</div>

<script>
/** Edit Controller */
adminApp.controller('adminEditController', ['$scope', function($scope) {
	$scope.tinymceOptions = {
		plugins: 'link image code',
		toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
	};
	$scope.singleSelect2Options = {

	};
	$scope.multipleSelect2Options = {
		multiple: true,
		allowClear:true,
		simple_tags: true
	};
	$scope.item = <?= json_encode($item) ?>;
	$scope.load = function() {
		$.ajax({
			url: '/api/admin/user/item/user/' + $scope.item.id,
			dataType: 'json',
			success: function(item) {
				$scope.item = item;
				$scope.$apply();
			}
		});
	};
	$scope.save = function() {
		$.ajax({
			url: '/api/admin/user/update/user/' + $scope.item.id,
			dataType: 'json', type: 'post',
			data: {
				item: angular.copy($scope.item)
			},
			success: function(resp) {
				window.location = '/admin/user?last_id=' + $scope.item.id;
			}
		});
	};
	$scope.toDate = function(d) {
		return new Date(d);
	}
	$scope.load();
	$scope.toggleSet = function(haystack, needle) {
		var i = haystack.indexOfMatched(needle);
		if(i == -1) {
			haystack.push(needle);
		} else {
			haystack.splice(i, 1);
		}
	};

	<?php
	if(isset($controller->edits)) {
		foreach($controller->edits as $index => $edit) { 
			if(isset($edit['fields'])) {
				foreach($edit['fields'] as $field) { 
					if($field['type'] == 'select' || $field['type'] == 'select/dialog') {
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
							$scope.select_<?= $setting['index']?> = <?= json_encode($items);?>;
							<?php if($setting['index'] == 'categoryIds'):?>
							$scope.select_<?= $setting['index']?> = buildBottomTree($scope.select_<?= $setting['index']?>);
							<?php endif;?>
							<?php
						}
					}
				}
			}
		}
	}
	?>
}]);
/** End Edit Controller */

</script>
