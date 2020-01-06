<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
<label><?= $tieu_de ? $tieu_de : $label ?></label>
<input class="form-control" type="text" placeholder="Tìm kiếm" ng-model="tim_kiem_<?= $ban_ghi_cap_nhat ?>_id_huyen" />
  <select class="form-control" ng-model="<?= $ban_ghi_cap_nhat ?>.id_huyen | filter: tim_kiem_<?= $ban_ghi_cap_nhat ?>_id_huyen">
    <option ng-value="null">Quận huyện</option>
    <option ng-value="ban_ghi.id" ng-repeat="ban_ghi in lay_danh_sach_quan_huyen(<?= $ban_ghi_cap_nhat ?>.id_tinh)">{{ban_ghi.ten_dia_diem}}</option>
  </select>
</div>