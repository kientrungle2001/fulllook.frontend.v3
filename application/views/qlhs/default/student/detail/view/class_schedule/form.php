<h2 class="lead">Xếp vào lớp</h2>

<div class="row">
  <div class="col-md-3">Chọn lớp</div>
  <div class="col-md-7">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_schedule_add.class_id">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
    </select>
  </div>

  <div class="col-md-3">Ngày vào học</div>
  <div class="col-md-7">
    <?php $c->tag('text', ['model' => 'class_schedule_add.startStudyDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="add_class_schedule(class_schedule_add)">Xếp lớp</button>
  </div>
</div>
<hr />
<h2 class="lead">Chuyển lớp</h2>

<div class="row">
  <div class="col-md-2">Từ lớp</div>
  <div class="col-md-4">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_schedule_change.from_class_id">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
    </select>
  </div>
  <div class="col-md-2">Sang lớp</div>
  <div class="col-md-4">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_schedule_change.to_class_id">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
    </select>
  </div>

  <div class="col-md-2">Ngày chuyển</div>
  <div class="col-md-6">
    <?php $c->tag('text', ['model' => 'class_schedule_change.startStudyDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="change_class_schedule(class_schedule_change)">Xếp lớp</button>
  </div>
</div>
<hr />
<h2 class="lead">Dừng học lớp</h2>

<div class="row">
  <div class="col-md-3">Chọn lớp</div>
  <div class="col-md-7">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_schedule_stop.class_id">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
    </select>
  </div>

  <div class="col-md-3">Ngày dừng học</div>
  <div class="col-md-7">
    <?php $c->tag('text', ['model' => 'class_schedule_stop.startStudyDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="stop_class_schedule(class_schedule_stop)">Dừng học</button>
  </div>
</div>