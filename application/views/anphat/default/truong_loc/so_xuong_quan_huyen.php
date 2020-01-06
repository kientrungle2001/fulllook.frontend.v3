<div class="form-group col-md-<?= $kich_co ? $kich_co : ($size ? $size : 12) ?>">
<label><?= $tieu_de ? $tieu_de : $label ?></label>
  <select class="form-control" ng-model="bo_loc.id_huyen">
    <option ng-value="null">Quận huyện</option>
    <option ng-value="ban_ghi.id" ng-repeat="ban_ghi in lay_danh_sach_quan_huyen(bo_loc.id_tinh)">{{ban_ghi.ten_dia_diem}}</option>
  </select>
</div>