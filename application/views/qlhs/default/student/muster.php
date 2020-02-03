<?php $c->js('controller/general_factories/get_lists.js')?>
<?php $c->js('controller/student_muster.js')?>
<div class="container-fluid" ng-controller="student_muster_controller">
  <h1>Điểm danh học sinh</h1>
  <div class="row">
    <div class="col-md-12">
      <h2 class="lead">Thêm điểm danh</h2>
      <form onsubmit="return false;">
        <div class="form-group">
          <label for="classId">Lớp</label>
          <?php $c->view('general/class_selector', ['class_selector_model' => 'classId', 'class_selector_change' => 'select_class()'])?>
        </div>
        <div class="form-group">
          <label for="studyDate">Ngày điểm danh</label>
          <select class="form-control form-control-sm col-12" ng-model="studyDate">
            <option>Chọn ngày</option>
            <option ng-value="class_schedule.studyDate" ng-repeat="class_schedule in class_schedules">{{class_schedule.studyDate}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="studentIds">Học sinh</label>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Điểm danh</th>
              </tr>
              <tr ng-repeat="student in students">
                <td><input type="checkbox"></td>
                <td>{{student.id}}</td>
                <td>{{student.name}}
                </td>
                <td>{{student.phone}}</td>
                <td>
                <button class="btn btn-primary btn-sm">CM</button>
                  <button class="btn btn-primary btn-sm">NTT</button>
                  <button class="btn btn-primary btn-sm">NKT</button>
                </td>
              </tr>
            </table>          
          </div>
          
        </div>
        <div class="form-group">
        <label>Trạng thái</label>
        <select class="form-control form-control-sm">
          <option ng-value="null">Chọn trạng thái</option>
          <option value="NTT">Nghỉ trừ tiền</option>
        </select>
        </div>
        <div class="form-group text-right">
        <button class="btn btn-primary">Thêm điểm danh</button>
        </div>
      </form>

    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
        <?php $c->view('general/class_selector', ['class_selector_model' => 'classId', 'class_selector_change' => ''])?>
        <select>
            <option>Chọn ngày</option>
          </select>
        </div>
        <div class="col-md-12 text-right">Sắp xếp: <select>
          <option ng-value="null">Lớp - Ngày điểm danh tăng</option>
        </select>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Tên học sinh</th>
            <th>Ngày điểm danh</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
          <tr ng-repeat="student_schedule in student_schedules">
            <td>{{student_schedule.studentId}}</td>
            <td>{{student_schedule.studentName}}</td>
            <td>{{student_schedule.studyDate}}</td>
            <td>Nghỉ trừ tiền</td>
            <td><a href="#" class="fa fa-edit"></a> <a href="#" class="fa fa-remove text-danger"></a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});
</script>