<div class="text-right">
  <a href="#" onclick="return false" ng-click="tai_danh_sach_xep_lop()" class="fa fa-refresh text-primary">Tải lại</a>
</div>
<table class="table table-hover">
  <tr>
    <th>Tên lớp</th>
    <th>Môn học</th>
    <th>Ngày vào học</th>
    <th>Ngày dừng học</th>
    <th>Hành động</th>
  </tr>
  <tr ng-repeat="xep_lop in danh_sach_xep_lop">
    <td>{{xep_lop.className}}</td>
    <td>{{xep_lop.subjectName}}</td>
    <td>{{xep_lop.startClassDate}}</td>
    <td>{{xep_lop.endClassDate}}</td>
    <td>
      <a class="fa fa-edit text-success" onclick="return false;" ng-click="edit_class_schedule(xep_lop)"></a>
      <a href="#" onclick="return false;" class="fa fa-trash text-danger" ng-click="remove_class_schedule(xep_lop)"></a>
    </td>
  </tr>
</table>

<div id="edit_class_schedule" class="modal fade" tabindex="-1" role="dialog">
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
            <select class="form-control form-control-sm" placeholder="Lớp" ng-model="selected_class_schedule.classId">
              <option ng-value="null">Lớp</option>
              <option ng-repeat="cl in classes" ng-value="cl.id">{{cl.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">Ngày vào học</div>
          <div class="col-md-7">
            <?php $c->tag('text', ['model' => 'selected_class_schedule.startClassDate']) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">Ngày dừng học</div>
          <div class="col-md-7">
            <?php $c->tag('text', ['model' => 'selected_class_schedule.endClassDate']) ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="update_class_schedule(selected_class_schedule)" data-dismiss="modal">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>