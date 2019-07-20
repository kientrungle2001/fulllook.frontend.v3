<?php if(!isset($is_js)):?>
<div id="admin_table_list" class="table-div">
	<div class="table-div-head">
		<div class="row">
			<div class="col-md-1"><input type="checkbox" id="selecctall"></div>
			<div class="col-md-2 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('news.id')">#ID</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('news.id'), 'fa-sort-up': isSortingAscByField('news.id')}"></span></div>
			<div class="col-md-15 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('news.name')">Tên danh mục</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('news.name'), 'fa-sort-up': isSortingAscByField('news.name')}"></span></div>
			<div class="col-md-2 text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('news.ordering')">Thứ tự</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('news.ordering'), 'fa-sort-up': isSortingAscByField('news.ordering')}"></span></div>
			<div class="col-md-2">Hành động</div>
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
			<div class="col-md-15">
				<div class="row row-img-fluid">
					<div class="col-md-24 col-24"><a href="/admin/news/edit/{{item.id}}" ng-bind-html="item.title"></a></div>
				</div>
			</div>
			<div class="col-md-2">{{item.ordering}}</div>
			<div class="col-md-2">
				<a href="/admin/news/edit/{{item.id}}" class="fa fa-pencil-square-o"></a>
				<a href="javascript:void(0)" onclick="return false" ng-click="remove(item)" class="fa fa-remove text-danger"></a>
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
				var data = { where: {software: 1}, sort: $scope.getSort(), fields: 'id,title,status,ordering', pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				news_ajax(data, function(result) {
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