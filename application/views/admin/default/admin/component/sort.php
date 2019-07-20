<!-- Sortings -->
<div class="card">
	<div class="card-header bg-success text-white">Sắp xếp</div>
	<div class="card-body">
		<form>
			<div class="row">
				<div class="col-md-6">
					<button class="btn btn-primary btn-block" ng-click="addSorting()">Thêm</button>
				</div>
			</div>
			<div class="row mt-3" ng-repeat="sort in sorts">
				<div class="col-md-12">
					<select ng-model="sort.index" class="form-control" ng-change="reload()">
						<option ng-value="null">{{sort.index}}</option>
						<option ng-value="sortField.index" ng-repeat="sortField in sortFields">{{sortField.label}}</option>
					</select>
				</div>
				<div class="col-md-8">
					<select ng-model="sort.dir" class="form-control" ng-change="reload()">
						<option ng-value="null">Thứ tự</option>
						<option value="asc">Tăng</option>
						<option value="desc">Giảm</option>
					</select>
				</div>
				<div class="col-md-4">
					<button class="btn btn-danger btn-block" ng-click="removeSortingByField(sort.index); reload();">Xóa</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Sortings -->