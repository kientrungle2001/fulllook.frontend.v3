<form class="form">
  <div class="form-row">
    <div class="form-group col-md-6"><input class="form-control form-control-sm" placeholder="Tìm kiếm" ng-model="keyword" ng-change="get_list()"></div>
    <div class="form-group col-md-10">
      <button class="btn btn-primary" ng-click="add()">Thêm</button>
      <a class="btn btn-success" href="/student/muster">Điểm danh</a>
      <a class="btn btn-danger" href="/student/report">Báo cáo</a>
    </div>
    <?php if (0) : ?>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Khối" ng-model="selected_level">
          <option ng-value="null">Khối</option>
          <option ng-repeat="level in get_class_levels(classes)" ng-value="level">Khối {{level}}</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Lớp" ng-model="selected_class" ng-change="get_list()">
          <option ng-value="null">Lớp</option>
          <option ng-repeat="cl in classes | filter:{'level':selected_level}" ng-value="cl.id">{{cl.name}}</option>
        </select>
      </div>
    <?php else : ?>
      <div class="form-group col-md-4">
        <div class="btn-group btn-sm">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Chọn lớp
          </button>
          <div class="dropdown-menu">
            <div class="p-3">
            <div class="row" style="width: 300px;">
              <div class="form-group col-12">
              <label>Chọn Khối</label>
                <select class="form-control form-control-sm" placeholder="Khối" ng-model="selected_level">
                  <option ng-value="null">Khối</option>
                  <option ng-repeat="level in get_class_levels(classes)" ng-value="level">Khối {{level}}</option>
                </select>
              </div>
              <div class="form-group col-24">
              <label>Chọn Lớp</label>
                <select class="form-control form-control-sm" placeholder="Lớp" ng-model="selected_class" ng-change="get_list()">
                  <option ng-value="null">Lớp</option>
                  <option ng-repeat="cl in classes | filter:{'level':selected_level}" ng-value="cl.id">{{cl.name}}</option>
                </select>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</form>

<script>
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});
</script>