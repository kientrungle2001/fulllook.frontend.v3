<?php
$filters = [
	[
		'index' => 'categoryId',
		'label' => 'Danh mục',
		'type' => 'select',
		'table' => 'categories',
		'where' => [
			'status' => 1
		]
	],
	[
		'index' => 'testId',
		'label' => 'Đề thi',
		'type' => 'select',
		'table' => 'tests',
		'where' => [
			'status' => 1
		]
	],
	[
		'index' => 'questionType',
		'label' => 'Dạng câu hỏi',
		'type' => 'select',
		'table' => 'type',
		'where' => [
			'status' => 1
		]
	],
	[
		'index' => 'classes',
		'label' => 'Lớp',
		'type' => 'select',
		'table' => 'classes',
		'where' => [
			'status' => 1
		]
	],
	[
		'index' => 'trial',
		'label' => 'Dùng thử',
		'type' => 'status'
	],
	[
		'index' => 'status',
		'label' => 'Trạng thái',
		'type' => 'status'
	],
	[
		'index' => 'hasAudio',
		'label' => 'Âm thanh',
		'type' => 'status'
	],
	[
		'index' => 'hasImage',
		'label' => 'Hình ảnh',
		'type' => 'status'
	],
	[
		'index' => 'translated',
		'label' => 'Dịch',
		'type' => 'status'
	],
	[
		'index' => 'check',
		'label' => 'Duyệt',
		'type' => 'status'
	],
	[
		'index' => 'deleted',
		'label' => 'Xóa',
		'type' => 'status'
	],
	[
		'index' => 'lock',
		'label' => 'Khóa',
		'type' => 'status'
	]
];
?>



<div class="container-fluid" ng-controller="adminGridController">
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-success text-white">Bộ lọc</div>
				<div class="card-body">
					<form>
						<div class="row">
							<?php foreach($filters as $filter):?>
							<div class="col-md-12">
								<?php $controller->view('filter/' . $filter['type'], $filter)?>
							</div>
							<?php endforeach ?>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-18">
			<div class="card">
				<div class="card-header bg-success text-white">Quản trị câu hỏi</div>
				<div class="card-body">
					<table id="admin_table_list" class="table table-hover table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th><input type="checkbox" id="selecctall"></th>
								<th>#</th>
								<th>Câu hỏi</th>
								<th>Lớp</th>
								<th>Người chấm</th>
								<th>Thứ tự</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="7">

									<form class="form-inline">
										<strong>Số mục: </strong> <select name="pageSize"
											class="form-control input-sm pageSize"
											onchange="pzk_list.changePageSize(this.value);">
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="500">500</option>
											<option value="1000">1000</option>
										</select>
										

										<strong>Trang: </strong> <a class="btn btn-sm btn-primary" href="#"
											>1</a>
										<a class="btn btn-sm btn-default" href="#"
											>2</a>
										<a class="btn btn-sm btn-default" href="#"
											>3</a>
										<a class="btn btn-sm btn-default" href="#"
											>4</a>
										<a class="btn btn-sm btn-default" href="#"
											>5</a>
										<a class="btn btn-sm btn-default" href="#"
											>6</a>
										<a class="btn btn-sm btn-default" href="#"
											>408</a>
										(8156 bản ghi)
									</form>
								</td>
							</tr>

							<tr ng-repeat="item in items" class="row-item row-item-{{item.id}} row-parent-" rel="{{item.id}}">
								<td><input class="grid_checkbox" type="checkbox"
										name="grid_check[]" value="{{item.id}}"></td>
								<td style="white-space: nowrap; padding: 8px;">
									{{item.id}}</td>
								<td>
								<div class="row row-img-fluid">
									<div class="col-md-12 col-24">
										<a href="#" ng-bind-html="item.name"></a>
									</div>
									<div ng-bind-html="item.name_vn" class="col-md-12 col-24"></div>
								</div>
								<div class="row" ng-repeat="answer in item.ref_question_answers">
									<div class="col-12" ng-bind-html="answer.content">
									</div>
									<div class="col-12" ng-bind-html="answer.content_vn">
									</div>
								</div>

								<hr />
								<div>
								<strong>{{item.trial ? 'Dùng thử | ': ''}}</strong>
									<strong>{{item.hasAudio ? 'Có âm thanh': 'Không âm thanh'}}</strong>
									| <strong>{{item.hasImage ? 'Có hình': 'Không hình'}}</strong>
									| <strong>{{item.translated ? 'Đã dịch': 'Chưa dịch'}}</strong>
									<strong>{{item.lock ? ' | Đang khóa': ''}}</strong>
									| <strong>{{item.check ? 'Đã duyệt': 'Chưa duyệt'}}</strong>
									<strong>{{item.deleted ? ' | Đã xóa': ''}}</strong>
								</div>
								<hr />
								<div>
								<strong>Danh mục: </strong><span>{{categories_of(item.categoryIds)}}</span>
								</div>
								<hr />
								<div>
								<strong>Đề thi: </strong><span>{{tests_of(item.testId)}}</span>
								</div>
								</td>
								<td>{{item.classes | classes_filter}}</td>
								<td></td>
								<td>{{item.ordering}}</td>
								<td></td>
							</tr>

							<tr>
								<td colspan="7">
									<form class="form-inline">
										<strong>Số mục: </strong> <select name="pageSize"
											class="pageSize form-control input-sm">
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="500">500</option>
											<option value="1000">1000</option>
										</select>

										<strong>Trang: </strong> <a class="btn btn-sm btn-primary" href="#"
											>1</a>
										<a class="btn btn-sm btn-default" href="#"
											>2</a>
										<a class="btn btn-sm btn-default" href="#"
											>3</a>
										<a class="btn btn-sm btn-default" href="#"
											>4</a>
										<a class="btn btn-sm btn-default" href="#"
											>5</a>
										<a class="btn btn-sm btn-default" href="#"
											>6</a>
										<a class="btn btn-sm btn-default" href="#"
											>408</a>
									</form>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
adminApp.controller('adminGridController', [
	'$scope', function($scope) {
			$scope.filters = <?php echo json_encode($filters)?>;
			$scope.reload = function() {
				$scope.load();
			};
			
			$scope.load = function() {
				var data = {
					where: {
						software: 1
					},
					sort: 'id desc'
				};
				for(var k in $scope.filter_data) {
					data.where[k] = $scope.filter_data[k];
				}
				$.ajax({
					url: 'http://api2.nextnobels.com/educationquestions',
					dataType: 'json',
					data: data,
					success: function(items) {
						$scope.items = items;
						var categoryIds = [];
						var testIds = [];
						items.forEach(function(item) {
							var catIds = item.categoryIds.split(',');
							catIds.forEach(function(catId) {
								if(catId !== '') {
									if(categoryIds.indexOf(catId) == -1) {
										categoryIds.push(catId);
									}
								}
							});

							var tIds = item.testId.split(',');
							tIds.forEach(function(testId) {
								if(testId !== '') {
									if(testIds.indexOf(testId) == -1) {
										testIds.push(testId);
									}
								}
							});
						});
						if(categoryIds.length > 0)
						$.ajax({
							url: 'http://api2.nextnobels.com/corecategories',
							dataType: 'json',
							data: {
								where: {
									id: categoryIds
								},
								select: 'id,name'
							},
							success: function(categories) {
								$scope.categories = categories;
								$scope.$apply();
							}
						});
						if(testIds.length > 0)
						$.ajax({
							url: 'http://api2.nextnobels.com/educationtests',
							dataType: 'json',
							data: {
								where: {
									id: testIds
								},
								select: 'id,name'
							},
							success: function(tests) {
								$scope.tests = tests;
								$scope.$apply();
							}
						});
						$scope.$apply();
					}
				});
			};
			$scope.load();
			$scope.categories = false;
			$scope.categories_of = function(catIds) {
				var categoryIds = catIds.split(',');
				var categoryNames = [];
				if($scope.categories) {
					categoryIds.forEach(function(catId) {
						if(catId !== '') {
							$scope.categories.forEach(function(category) {
								if(parseInt(category.id) == parseInt(catId)) {
									categoryNames.push(category.name);
									return false;
								}
							});
						}
					});
				}
				return categoryNames.join(', ');
			};

			$scope.tests = false;
			$scope.tests_of = function(testIds) {
				var testIds = testIds.split(',');
				var testNames = [];
				if($scope.tests) {
					testIds.forEach(function(testId) {
						if(testId !== '') {
							$scope.tests.forEach(function(test) {
								if(parseInt(test.id) == parseInt(testId)) {
									testNames.push(test.name);
									return false;
								}
							});
						}
					});
				}
				return testNames.join(', ');
			};
	}
]);

adminApp.filter('classes_filter', function() {
	return function(str) {
		return str.replace(/^,/,'').replace(/,$/, '');
	}
});
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