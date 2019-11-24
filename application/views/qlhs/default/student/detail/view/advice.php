<h1>Tư vấn <button class="btn btn-primary" onclick="jQuery('#modal_advice').modal('show')">Them</button></h1>
<table class="table table-hover">
  <tr>
    <th>Ngày tư vấn</th>
    <th>Nội dung tư vấn</th>
    <th>Người tư vấn</th>
    <th>Khóa học</th>
    <th>Môn</th>
    <th>Trạng thái</th>
  </tr>
  <tr ng-repeat="tu_van in danh_sach_tu_van">
    <td>{{tu_van.time}}</td>
    <td>{{tu_van.content}}</td>
    <td>{{tu_van.adviceName}}</td>
    <td>{{tu_van.className}}</td>
    <td>{{tu_van.subjectName}}</td>
    <td>{{tu_van.status}}</td>
  </tr>
</table>
<div id="modal_advice" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Them tu van</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form class="form">
  
        <div class="form-row">
          <div class="form-group col-md-8">
          <label>Họ và tên</label>
            <input class="form-control form-control-sm" placeholder="Họ và tên" ng-model="<?= $model?>.name">
          </div>
          <div class="form-group col-md-4">
          <label>Mã HS</label>
            <input class="form-control form-control-sm" placeholder="Mã HS" ng-model="<?= $model?>.code">
          </div>
          <div class="form-group col-md-4">
          <label>SĐT</label>
            <input class="form-control form-control-sm" placeholder="SĐT" ng-model="<?= $model?>.phone">
          </div>
          <div class="form-group col-md-8">
          <label>Email</label>
            <input class="form-control form-control-sm" placeholder="Email" ng-model="<?= $model?>.email">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
          <label>Phụ huynh</label>
            <input class="form-control form-control-sm" placeholder="Phụ huynh" ng-model="<?= $model?>.parentName">
          </div>
          <div class="form-group col-md-8">
          <label>Địa chỉ</label>
            <input class="form-control form-control-sm" placeholder="Địa chỉ" ng-model="<?= $model?>.address">
          </div>
          <div class="form-group col-md-8">
          <label>Trường</label>
            <input class="form-control form-control-sm" placeholder="Trường" ng-model="<?= $model?>.school">
          </div>
          <div class="form-group col-md-4">
            <label>Ngày sinh</label>
            <input type="text" class="form-control form-control-sm" placeholder="Ngày sinh" ng-model="<?= $model?>.birthDate">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
          <label>Ngày nhập học</label>
            <input type="text" class="form-control form-control-sm" placeholder="Ngày nhập học" ng-model="<?= $model?>.startStudyDate">
            
          </div>
          <div class="form-group col-md-4">
          <label>Ngày tu van</label>
            <input type="text" class="form-control form-control-sm" placeholder="Ngày dừng học" ng-model="<?= $model?>.endStudyDate">
          </div>
          <div class="form-group col-md-8">
          <label>Nhân viên tư vấn</label>
          <select class="form-control form-control-sm" ng-model="assignId">
            <option ng-value="0">Nhân viên tư vấn</option>
            <option ng-value="teacher.id" ng-repeat="teacher in teachers">{{teacher.name}}</option>
          </select>
          </div>
          <div class="form-group col-md-4">
          <label>Trạng thái</label>
            <select class="form-control form-control-sm" ng-model="status"><option ng-value="null">Trạng thái</option>
            <option ng-value="1">Thanh cong</option>
            <option ng-value="2">That bai</option>
            </select>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-24">
          <label>Ghi chú</label>
            <textarea class="form-control form-control-sm" placeholder="Ghi chú" ng-model="<?= $model?>.note"></textarea>
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="update(erow)">Cập nhật</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>