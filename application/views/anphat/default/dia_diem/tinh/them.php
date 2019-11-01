<form>
  <div class="form-row">
  <div class="form-group col-md-12">
  <input class="form-control" placeholder="Tên tỉnh" ng-model="them_tinh.ten_dia_diem">
  </div>
  <div class="form-group col-md-6">
  <input class="form-control" placeholder="Mã tỉnh" ng-model="them_tinh.ma_dia_diem">
  </div>
  <div class="form-group col-md-6">
  <button class="btn btn-primary form-control" ng-click="them_dia_diem(them_tinh)">Thêm tỉnh</button>
  </div>
  </div>
</form>