<div id="modal_fee" class="modal fade" tabindex="-1" role="dialog"  ng-init="a_fee={};a_fee.items=[{}];">
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
              <label>Học sinh</label>
              <input type="text" class="form-control form-control-sm" placeholder="Học sinh" ng-model="a_fee.name">
            </div>
            <div class="form-group col-md-4">
              <label>Số điện thoại</label>
              <input type="text" class="form-control form-control-sm" placeholder="Số điện thoại" ng-model="a_fee.phone">
            </div>
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="text" class="form-control form-control-sm" placeholder="Email" ng-model="a_fee.email">
            </div>
            <div class="form-group col-md-4">
              <label>Địa chỉ</label>
              <input type="text" class="form-control form-control-sm" placeholder="Địa chỉ" ng-model="a_fee.address">
            </div>
            <div class="form-group col-md-4">
              <label>Hình thức trả phí</label>
              <select type="text" class="form-control form-control-sm" placeholder="Tiền mặt" ng-model="a_fee.paymentType">
                <option ng-value="0">Tiền mặt</option>
                <option ng-value="1">Chuyển khoản</option>
              </select>
            </div>
          </div>
          <div class="form-row" ng-repeat="c_fee in a_fee.items">
            <div class="form-group col-md-4">
              <label>Lớp</label>
              <select type="text" class="form-control form-control-sm" placeholder="Lớp" ng-model="c_fee.classId">
                <option ng-value="null">Chọn lớp</option>
                <option ng-value="cl.id" ng-repeat="cl in classes">{{cl.name}}</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Kỳ thanh toán</label>
              <select type="text" class="form-control form-control-sm" placeholder="Kỳ thanh toán" ng-model="c_fee.payment_periodId">
                <option ng-value="null">Chọn Kỳ thanh toán</option>
                <option ng-value="cl.id" ng-repeat="cl in classes">{{cl.name}}</option>
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