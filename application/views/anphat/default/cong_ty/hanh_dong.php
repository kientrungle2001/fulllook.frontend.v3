<div class="row">
  <div class="col-24">
    <select class="btn btn-light">
      <option ng-value="null">Chọn hành động</option>
    </select>
    <button class="btn btn-primary">Áp dụng</button>
    <input class="form-control form-control-reset" style="width: 200px" placeholder="Tìm kiếm nhân viên" ng-model="bo_loc_hanh_dong.tim_kiem_nhan_vien">
    <select class="btn btn-success" ng-model="nhan_vien_kinh_doanh">
      <option ng-value="null">Chọn nhân viên</option>
      <option ng-value="nhan_vien.ten_dang_nhap" ng-repeat="nhan_vien in danh_sach_nhan_vien | filter: bo_loc_hanh_dong.tim_kiem_nhan_vien">{{nhan_vien.ten_nhan_vien}} ({{nhan_vien.ten_dang_nhap}})</option>
    </select>
    <button class="btn btn-primary" ng-click="gan_nhan_vien_kinh_doanh()">Gán nhân viên</button>
  </div>
</div>