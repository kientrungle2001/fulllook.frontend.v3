<form class="form">
  <div class="form-row">
    <div class="form-group col-md-6"><input class="form-control form-control-sm" 
    placeholder="Tìm kiếm" ng-model="keyword" ng-change="get_list()"></div>
    <div class="form-group col-md-12">
    <button class="btn btn-primary" ng-click="add()">Thêm</button>
    <a class="btn btn-success" href="/student/muster">Điểm danh</a>
    <button class="btn btn-danger" href="student/report">Báo cáo</button>
    </div>
    <div class="form-group col-md-6">
      <select class="form-control form-control-sm" placeholder="Lớp" ng-model="selected_class" ng-change="get_list()">
        <option ng-value="null">Lớp</option>
        <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
      </select>
    </div>
  </div>
</form>