<?php if(!isset($is_js)):?>
<div id="admin_table_list" class="table-div">
	<div class="table-div-head">
		<div class="row">
			<div class="col-md-1"><input type="checkbox" id="selecctall"></div>
			<div class="col-md-2 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('user.id')">#ID</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('user.id'), 'fa-sort-up': isSortingAscByField('user.id')}"></span></div>
			<div class="col-md-19 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('user.name')">Họ tên</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('user.name'), 'fa-sort-up': isSortingAscByField('user.name')}"></span></div>
			<div class="col-md-1 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('user.class')">Lớp</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('user.class'), 'fa-sort-up': isSortingAscByField('user.class')}"></span></div>
			<div class="col-md-1">HĐ</div>
		</div>
	</div>
	<div class="table-div-body">
		<div class="row"><div class="col-24"><?php $controller->view('admin/component/pagination'); ?></div></div>

		<div ng-repeat-start="item in items" class="row row-item row-item-{{item.id}} row-parent-{{item.parent}}" rel="{{item.id}}"
			ng-class="{'table-success': grid_check[item.id]}">
			<div class="col-md-1"><input class="grid_checkbox" type="checkbox"
					name="grid_check[]" value="{{item.id}}" ng-model="grid_check[item.id]"></div>
			<div class="col-md-2" style="white-space: nowrap; cursor: pointer;" ng-click="grid_check[item.id] = !grid_check[item.id]">
				{{pageSize * pageNum + $index + 1}}
				-
				{{item.id}}</div>
			<div class="col-md-19">
				<div class="row row-img-fluid">
					<div class="col-md-4 col-24"><a href="/admin/user/edit/{{item.id}}" ng-bind-html="item.name"></a></div>
					<div ng-bind-html="item.username" class="col-md-4 col-24 pointer" ng-click="grid_check[item.id] = !grid_check[item.id]"></div>
					<div ng-bind-html="item.phone" class="col-md-4 col-24 pointer" ng-click="grid_check[item.id] = !grid_check[item.id]"></div>
					<div ng-bind-html="item.email" class="col-md-8 col-24 pointer" ng-click="grid_check[item.id] = !grid_check[item.id]"></div>
					<div class="col-md-4">{{item.note}}</div>
				</div>
			</div>
			<div class="col-md-1">{{item.class | classes_filter}}</div>
			<div class="col-md-1">
				<a href="/admin/category/user/{{item.id}}" class="fa fa-pencil-square-o"></a>
				<a href="javascript:void(0)" onclick="return false" ng-click="remove(item)" class="fa fa-remove text-danger"></a>
			</div>
			
		</div>
		<hr ng-repeat-end style="margin-top: 2px;margin-bottom: 2px;" />

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
				var data = { where: {}, sort: $scope.getSort(), fields: 'id,name,username,phone,email,class,status,note', pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				users_ajax(data, function(result) {
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