<form class="form">
  <div class="form-row">
    <div class="form-group col-md-6"><input class="form-control form-control-sm" placeholder="Tìm kiếm" ng-model="keyword" ng-change="get_list()"></div>
    <div class="form-group col-md-10">
      <button class="btn btn-primary" ng-click="add()">Thêm</button>
      <a class="btn btn-success" href="/student/muster">Điểm danh</a>
      <a class="btn btn-danger" href="/student/report">Báo cáo</a>
    </div>
    <div class="form-group col-md-4">
      <?php $c->view('general/class_selector', ['class_selector_model' => 'selected_class', 'class_selector_change' => 'get_list()'])?>
    </div>
  </div>
</form>