<div class="text-right">
  <a href="#" onclick="return false" ng-click="get_class_students()" class="fa fa-refresh text-primary">Tải lại</a>
</div>
<table class="table table-hover">
  <tr>
    <th>Tên lớp</th>
    <th>Môn học</th>
    <th>Ngày vào học</th>
    <th>Ngày dừng học</th>
    <th>Hành động</th>
  </tr>
  <tr ng-repeat="class_student in class_students">
    <td>{{class_student.className}}</td>
    <td>{{class_student.subjectName}}</td>
    <td>{{class_student.startClassDate}}</td>
    <td>{{class_student.endClassDate}}</td>
    <td>
      <a class="fa fa-edit text-success" onclick="return false;" ng-click="edit_class_student(class_student)"></a>
      <a href="#" onclick="return false;" class="fa fa-trash text-danger" ng-click="remove_class_student(class_student)"></a>
    </td>
  </tr>
</table>

<div id="edit_class_student" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sửa xếp lớp cho học sinh {{selected_row.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">Chọn lớp</div>
          <div class="col-md-7">
            <select class="form-control form-control-sm" placeholder="Lớp" ng-model="selected_class_student.classId">
              <option ng-value="null">Lớp</option>
              <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">Ngày vào học</div>
          <div class="col-md-7">
            <?php $c->tag('text', ['model' => 'selected_class_student.startClassDate']) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">Ngày dừng học</div>
          <div class="col-md-7">
            <?php $c->tag('text', ['model' => 'selected_class_student.endClassDate']) ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="update_class_student(selected_class_student)" data-dismiss="modal">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>