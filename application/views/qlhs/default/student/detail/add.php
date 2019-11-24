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
    <label>Ngày dừng học</label>
      <input type="text" class="form-control form-control-sm" placeholder="Ngày dừng học" ng-model="<?= $model?>.endStudyDate">
    </div>
    <div class="form-group col-md-8">
    <label>Nhân viên tư vấn</label>
    <select class="form-control form-control-sm" ng-model="<?= $model?>.assignId">
      <option ng-value="0">Nhân viên tư vấn</option>
      <option ng-value="teacher.id" ng-repeat="teacher in teachers">{{teacher.name}}</option>
    </select>
    </div>
    <div class="form-group col-md-4">
    <label>Trạng thái</label>
      <select class="form-control form-control-sm" ng-model="<?= $model?>.status"><option ng-value="null">Trạng thái</option>
      <option ng-value="true">Đang học</option>
      <option ng-value="false">Dừng học</option>
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