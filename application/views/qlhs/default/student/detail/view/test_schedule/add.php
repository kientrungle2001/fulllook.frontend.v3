<div id="modal_test_schedule" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm lịch sử học tập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Ngày kiểm tra</label>
              <input type="text" class="form-control form-control-sm" placeholder="Ngày kiểm tra" ng-model="a_test_schedule.created">
            </div>
            <div class="form-group col-md-8">
              <label>Khóa học</label><br />
              <?= $c->view('general/class_selector', ['class_selector_model' => 'a_test_schedule.classId', 'class_selector_change' => ''])?>
            </div>
            <div class="form-group col-md-8">
              <label>Giáo viên</label>
              <select class="form-control form-control-sm" ng-model="a_test_schedule.adviceId">
                <option ng-value="0">Giáo viên</option>
                <option ng-value="teacher.id" ng-repeat="teacher in teachers">{{teacher.name}}</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Trạng thái</label>
              <select class="form-control form-control-sm" ng-model="a_test_schedule.status">
                <option ng-value="null">Trạng thái</option>
                <option ng-value="1">Thành công</option>
                <option ng-value="2">Thất bại</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-24">
              <label>Nhận xét</label>
              <textarea class="form-control form-control-sm" placeholder="Nhận xét" ng-model="a_test_schedule.note"></textarea>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="insert_test_schedule(a_test_schedule)">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>