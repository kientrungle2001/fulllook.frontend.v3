<div id="modal_edit_advice" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm tư vấn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Ngày tư vấn</label>
              <input type="text" class="form-control form-control-sm" placeholder="Ngày tư vấn" ng-model="e_advice.time">
            </div>
            <div class="form-group col-md-8">
              <label>Khóa học</label><br />
              <?= $c->view('general/class_selector', ['class_selector_model' => 'e_advice.classId', 'class_selector_change' => ''])?>
            </div>
            <div class="form-group col-md-8">
              <label>Giáo viên tư vấn</label>
              <select class="form-control form-control-sm" ng-model="e_advice.adviceId">
                <option ng-value="0">Giáo viên tư vấn</option>
                <option ng-value="teacher.id" ng-repeat="teacher in teachers">{{teacher.name}}</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Trạng thái</label>
              <select class="form-control form-control-sm" ng-model="e_advice.status">
                <option ng-value="null">Trạng thái</option>
                <option ng-value="1">Thành công</option>
                <option ng-value="2">Thất bại</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-24">
              <label>Ghi chú</label>
              <textarea class="form-control form-control-sm" placeholder="Ghi chú" ng-model="e_advice.content"></textarea>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="update_advice(e_advice)">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>