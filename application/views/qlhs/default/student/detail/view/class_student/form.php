<h2 class="lead">Xếp vào lớp</h2>

<div class="row">
  <div class="col-md-3">Chọn lớp</div>
  <div class="col-md-7">
    <?php $c->view('general/class_selector', ['class_selector_model' => 'class_student_add.classId', 'class_selector_change' => ''])?>
  </div>

  <div class="col-md-3">Ngày vào học</div>
  <div class="col-md-7">
    <?php $c->tag('text', ['model' => 'class_student_add.startClassDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="add_class_student(class_student_add)">Xếp lớp</button>
  </div>
</div>
<hr />
<h2 class="lead">Chuyển lớp</h2>

<div class="row">
  <div class="col-md-2">Từ lớp</div>
  <div class="col-md-4">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_student_change.fromClassId">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id" ng-show="selected_row && selected_row.currentClassIds.indexOf(cl.id) !== -1">{{cl.name}}</option>
    </select>
  </div>
  <div class="col-md-2">Sang lớp</div>
  <div class="col-md-4">
    <?php $c->view('general/class_selector', ['class_selector_model' => 'class_student_change.toClassId', 'class_selector_change' => ''])?>
  </div>

  <div class="col-md-2">Ngày chuyển</div>
  <div class="col-md-6">
    <?php $c->tag('text', ['model' => 'class_student_change.changeDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="change_class_student(class_student_change)">Chuyển lớp</button>
  </div>
</div>
<hr />
<h2 class="lead">Dừng học lớp</h2>

<div class="row">
  <div class="col-md-3">Chọn lớp</div>
  <div class="col-md-7">
    <select class="form-control form-control-sm" placeholder="Lớp" ng-model="class_student_stop.fromClassId">
      <option ng-value="null">Lớp</option>
      <option ng-repeat="cl in classes" ng-value="cl.id" ng-show="selected_row && selected_row.currentClassIds.indexOf(cl.id) !== -1">{{cl.name}}</option>
    </select>
  </div>

  <div class="col-md-3">Ngày dừng học</div>
  <div class="col-md-7">
    <?php $c->tag('text', ['model' => 'class_student_stop.stopDate'])?>
  </div>

  <div class="col-md-4">
    <button class="btn btn-primary form-control" ng-click="stop_class_student(class_student_stop)">Dừng học</button>
  </div>
</div>