<h2 class="lead">Xếp vào lớp</h2>

<div class="row">
  <div class="col-md-3">Chọn lớp</div>
  <div class="col-md-7">
    <?php $c->view('general/class_selector', ['class_selector_model' => 'class_student_add.classId', 'class_selector_change' => ''])?>
  </div>

  <div class="col-md-3">Ngày vào học</div>
  <div class="col-md-7">
    <?php $c->tag('text', ['model' => 'class_student_add.startClassDate'])?>
    <?php if(0):?>
    <select ng-model="class_student_add_startClassDate.day">
      <option>Ngày</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    <select ng-model="class_student_add_startClassDate.month">
      <option>Tháng</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
    <select ng-model="class_student_add_startClassDate.year">
    <option>Năm</option>
    <?php for($i = 2014; $i < 2030; $i++):?>  
    <option value="<?= $i?>"><?= $i?></option>
    <?php endfor;?>
    </select>
    <?php endif;?>
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
      <option ng-repeat="cl in class_students" ng-value="cl.classId">{{cl.className}}</option>
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
      <option ng-repeat="cl in class_students" ng-value="cl.classId">{{cl.className}}</option>
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