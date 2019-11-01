<form>
  <div class="form-row">
  <div class="form-group col-md-12">
  <input class="form-control" placeholder="Tên huyện" ng-model="them_huyen.ten_dia_diem">
  </div>
  <div class="form-group col-md-6">
  <input class="form-control" placeholder="Mã huyện" ng-model="them_huyen.ma_dia_diem">
  </div>
  <div class="form-group col-md-6">
  <button class="btn btn-primary form-control" ng-click="them_dia_diem(them_huyen)">Thêm huyện</button>
  </div>
  </div>
</form>