<div class="form-group col-md-<?= $kich_co ? $kich_co : ($size ? $size : 12) ?>">
<label><?= $tieu_de ? $tieu_de : $label ?></label>
  <select class="form-control" ng-model="bo_loc.id_tinh" multiple>
    <option ng-value="null">Tỉnh thành phố</option>
    <option ng-value="ban_ghi.id" ng-repeat="ban_ghi in danh_sach_tinh_thanh_pho">{{ban_ghi.ten_dia_diem}}</option>
  </select>
</div>