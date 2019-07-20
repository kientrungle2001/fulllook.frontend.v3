<?php if(!isset($is_js)):?>
<a href="/admin/config/add">+ Thêm config mới</a> | <a href="#" onclick="return false;" ng-click="removeSelecteds()">Xóa các bản ghi đang chọn</a>
<div id="admin_table_list" class="table-div">
	<div class="table-div-head">
		<div class="row">
			<div class="col-md-1"><input type="checkbox" id="selecctall"></div>
			<div class="col-md-2 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('config.id')">#ID</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('config.id'), 'fa-sort-up': isSortingAscByField('config.id')}"></span></div>
			<div class="col-md-17 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('config.mkey')">Giá trị</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('config.name'), 'fa-sort-up': isSortingAscByField('config.name')}"></span></div>
			<div class="col-md-1 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('config.ordering')">TT</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('config.ordering'), 'fa-sort-up': isSortingAscByField('config.ordering')}"></span></div>
			<div class="col-md-1">HĐ</div>
		</div>
	</div>
	<div class="table-div-body">
		<div class="row"><div class="col-24"><?php $controller->view('admin/component/pagination'); ?></div></div>

		<div ng-repeat="item in items" class="row row-item row-item-{{item.id}} row-parent-{{item.parent}}" rel="{{item.id}}"
			ng-class="{'table-success': grid_check[item.id]}">
			<div class="col-md-1"><input class="grid_checkbox" type="checkbox"
					name="grid_check[]" value="{{item.id}}" ng-model="grid_check[item.id]"></div>
			<div class="col-md-2" style="white-space: nowrap; cursor: pointer;" ng-click="grid_check[item.id] = !grid_check[item.id]">
				{{pageSize * pageNum + $index + 1}}
				-
				{{item.id}}</div>
			<div class="col-md-17">
				<div class="row row-img-fluid">
					<div class="col-md-4 col-24"><a href="/admin/config/edit/{{item.id}}" ng-bind-html="item.mkey"></a></div>
					<div class="col-md-20 col-24">{{item.mvalue}}</div>
				</div>
			</div>
			<div class="col-md-1">{{item.ordering}}</div>
			<div class="col-md-1">
				<a href="/admin/config/edit/{{item.id}}" class="fa fa-pencil-square-o"></a>
				<a href="javascript:void(0)" onclick="return false" ng-click="remove(item)" class="fa fa-remove text-danger"></a>
			</div>
		</div>

		<div ng-repeat="item in add_items" class="row row-item">
			<div class="col-md-3"><input class="form-control form-control-sm" ng-model="item.type" placeholder="Type"></div>
			<div class="col-md-17">
				<div class="row row-img-fluid">
					<div class="col-md-4 col-24"><input class="form-control form-control-sm" ng-model="item.mkey" placeholder="Key"></div>
					<div class="col-md-16 col-24">
					<textarea class="form-control" ng-model="item.mvalue" size="6" placeholder="Value"></textarea>
					</div>
					<div class="col-md-4 col-24"><input class="form-control form-control-sm" ng-model="item.ordering" placeholder="Thứ tự"></div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<a href="javascript:void(0)" onclick="return false" ng-click="add_row()" class="fa fa-plus"></a>
				<a href="javascript:void(0)" onclick="return false" ng-click="remove_row($index)" class="fa fa-remove text-danger"></a>
			</div>
		</div>
		<div class="row">
		<div class="col-md-4">
				<button class="btn btn-primary btn-block" ng-click="add_row()">Thêm bản ghi</button>
			</div>
			<div class="col-md-4">
				<button class="btn btn-success btn-block" ng-click="add()">Thêm</button>
			</div>
		</div>

		<div class="row"><div class="col-24"><?php $controller->view('admin/component/pagination'); ?></div></div>
	</div>
</div>
<style>
	.pointer {
		cursor: pointer;
	}
</style>
<?php else: ?>
<?php if(0): ?><script><?php endif;?>
			// load dữ liệu cho grid
			$scope.load = function() {
				var data = { where: {software: 1}, sort: $scope.getSort(), fields: '*', pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				configs_ajax(data, function(result) {
						var items = result.rows;
						$scope.items = items;
						$scope.total = result.total;
						$scope.total_pages = Math.ceil(parseInt($scope.total) / parseInt($scope.pageSize));
						$scope.$apply();
					});
			};

			
			
			// Grid multi values fields
			if(window.multiple_values_enabled) {
				$scope.categories = false;
				$scope.categories_of = function(catIds) {
					if($scope.categories) {
						return $scope.categories.joinField(catIds, 'name');
					} else {
						return '';
					}
				};
			}
<?php if(0): ?></script><?php endif;?>

<?php endif;?>