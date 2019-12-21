<div id="modal_advice" class="modal fade" tabindex="-1" role="dialog">
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
              <input type="text" class="form-control form-control-sm" placeholder="Ngày tư vấn" ng-model="a_advice.adviceDate">
            </div>
            <div class="form-group col-md-8">
              <label>Khóa học</label>
              <select class="form-control form-control-sm" ng-model="a_advice.classId">
                <option ng-value="0">Khóa học</option>
                <option ng-value="class.id" ng-repeat="class in classes">{{class.name}}</option>
              </select>
            </div>
            <div class="form-group col-md-8">
              <label>Giáo viên tư vấn</label>
              <select class="form-control form-control-sm" ng-model="a_advice.assignId">
                <option ng-value="0">Giáo viên tư vấn</option>
                <option ng-value="teacher.id" ng-repeat="teacher in teachers">{{teacher.name}}</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Trạng thái</label>
              <select class="form-control form-control-sm" ng-model="a_advice.status">
                <option ng-value="null">Trạng thái</option>
                <option ng-value="1">Thành công</option>
                <option ng-value="2">Thất bại</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-24">
              <label>Ghi chú</label>
              <textarea class="form-control form-control-sm" placeholder="Ghi chú" ng-model="a_advice.note"></textarea>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="insert_advice(a_advice)">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>