<?php if(!isset($is_js)):?>
<table id="admin_table_list" class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th><input type="checkbox" id="selecctall"></th>
			<th class="text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('questions.id')">#ID</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('questions.id'), 'fa-sort-up': isSortingAscByField('questions.id')}"></span></th>
			<th class="text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('questions.name')">Câu hỏi</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('questions.name'), 'fa-sort-up': isSortingAscByField('questions.name')}"></span></th>
			<th class="text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('questions.classes')">Lớp</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('questions.classes'), 'fa-sort-up': isSortingAscByField('questions.classes')}"></span></th>
			<th class="text-nowrap"><a href="javascript:void(0)" ng-click="toggleSorting('questions.ordering')">Thứ tự</a> <span class="fa" ng-class="{'fa-sort-down': isSortingDescByField('questions.ordering'), 'fa-sort-up': isSortingAscByField('questions.ordering')}"></span></th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		<tr><td colspan="7"><?php $controller->view('admin/component/pagination'); ?></td></tr>

		<tr ng-repeat="item in items" class="row-item row-item-{{item.id}} row-parent-" rel="{{item.id}}"
			ng-class="{'table-success': grid_check[item.id]}">
			<td><input class="grid_checkbox" type="checkbox"
					name="grid_check[]" value="{{item.id}}" ng-model="grid_check[item.id]"></td>
			<td style="white-space: nowrap; padding: 8px; cursor: pointer;" ng-click="grid_check[item.id] = !grid_check[item.id]">
				{{pageSize * pageNum + $index + 1}}
				<br />
				{{item.id}}</td>
			<td>
			<div class="row row-img-fluid">
				<div class="col-md-12 col-24"><a href="/admin/question/edit/{{item.id}}" ng-bind-html="item.name"></a></div>
				<div ng-bind-html="item.name_vn" class="col-md-12 col-24 pointer" ng-click="grid_check[item.id] = !grid_check[item.id]"></div>
			</div>
			<div class="row pointer" ng-repeat="answer in item.ref_question_answers" ng-click="grid_check[item.id] = !grid_check[item.id]">
				<div class="col-12" ng-bind-html="answer.content"></div>
				<div class="col-12" ng-bind-html="answer.content_vn"></div>
			</div>

			<hr />
			<div class="pointer" ng-click="grid_check[item.id] = !grid_check[item.id]">
			<strong>{{is_true(item.trial) ? 'Dùng thử | ': ''}}</strong>
				<strong>{{is_true(item.hasAudio) ? 'Có âm thanh': 'Không âm thanh'}}</strong>
				| <strong>{{is_true(item.hasImage) ? 'Có hình': 'Không hình'}}</strong>
				| <strong>{{is_true(item.translated) ? 'Đã dịch': 'Chưa dịch'}}</strong>
				<strong>{{is_true(item.lock) ? ' | Đang khóa': ''}}</strong>
				| <strong>{{is_true(item.check) ? 'Đã duyệt': 'Chưa duyệt'}}</strong>
				<strong>{{is_true(item.deleted) ? ' | Đã xóa': ''}}</strong>
			</div>
			
			<div class="pointer" ng-show="categories_of(item.categoryIds) != ''" ng-click="grid_check[item.id] = !grid_check[item.id]"><hr />
				<strong>Danh mục: </strong><span>{{categories_of(item.categoryIds)}}</span>
			</div>
			
			<div class="pointer" ng-show="tests_of(item.testId) != ''" ng-click="grid_check[item.id] = !grid_check[item.id]"><hr />
				<strong>Đề thi: </strong><span>{{tests_of(item.testId)}}</span>
			</div>
			
			<div class="pointer" ng-show="teachers_of(item.teacherIds) != ''" ng-click="grid_check[item.id] = !grid_check[item.id]"><hr />
				<strong>Giáo viên: </strong><span>{{teachers_of(item.teacherIds)}}</span>
			</div>
			</td>
			<td>{{item.classes | classes_filter}}</td>
			<td><input ng-model="item.ordering" size="1"></td>
			<td>
				<a href="/admin/question/edit/{{item.id}}" class="fa fa-pencil-square-o"></a>
				<a href="javascript:void(0)" onclick="return false" ng-click="remove(item)" class="fa fa-remove text-danger"></a>
			</td>
		</tr>

		<tr><td colspan="7"><?php $controller->view('admin/component/pagination'); ?></td></tr>
	</tbody>
</table>
<style>
	.pointer {
		cursor: pointer;
	}
</style>
<?php else: ?>
<?php if(0): ?><script><?php endif;?>
			// load dữ liệu cho grid
			$scope.load = function() {
				var data = { where: {software: 1}, sort: $scope.getSort(), pageSize: $scope.pageSize, pageNum: $scope.pageNum};
				$.extend(data.where, angular.copy($scope.filter_data));
				questions_ajax(data, function(result) {
						$scope.items = result.rows;
						$scope.total = result.total;
						$scope.total_pages = Math.ceil(parseInt($scope.total) / parseInt($scope.pageSize));
						var items = result.rows;
						var categoryIds = items.collectIds('categoryIds');
						var testIds = items.collectIds('testId');
						var teacherIds = items.collectIds('teacherIds');
						
						categories_ajax_set(categoryIds, function(result) {
							$scope.categories = result.rows;
							$scope.$apply();
						});
					
						tests_ajax_set(testIds, function(result) {
							$scope.tests = result.rows;
							$scope.$apply();
						});
						
						teachers_ajax_set(teacherIds, function(result) {
							$scope.teachers = result.rows;
							$scope.$apply();
						});
						
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

				$scope.tests = false;
				$scope.tests_of = function(testIds) {
					if($scope.tests) {
						return $scope.tests.joinField(testIds, 'name');
					} else {
						return '';
					}
				};

				$scope.teachers = false;
				$scope.teachers_of = function(teacherIds) {
					if($scope.teachers) {
						return $scope.teachers.joinField(teacherIds, 'name');
					} else {
						return '';
					}
				};
			}
<?php if(0): ?></script><?php endif;?>
<?php endif;?>