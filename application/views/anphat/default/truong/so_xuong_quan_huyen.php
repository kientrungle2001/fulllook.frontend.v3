<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
  <select class="form-control" ng-model="<?= $ban_ghi_cap_nhat ?>.id_huyen">
    <option ng-value="null">Quận huyện</option>
    <option ng-value="ban_ghi.id" ng-repeat="ban_ghi in lay_danh_sach_quan_huyen(<?= $ban_ghi_cap_nhat ?>.id_tinh)">{{ban_ghi.ten_dia_diem}}</option>
  </select>
</div>