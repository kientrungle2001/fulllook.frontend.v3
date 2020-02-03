<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
<label><?= $tieu_de ? $tieu_de : $label ?></label>
<input class="form-control" type="text" placeholder="Tìm kiếm" ng-model="tim_kiem_<?= $ban_ghi_cap_nhat ?>_id_tinh" />
  <select class="form-control" ng-model="<?= $ban_ghi_cap_nhat ?>.id_tinh">
    <option ng-value="null">Tỉnh / TP</option>
    <option ng-value="ban_ghi.id" ng-repeat="ban_ghi in danh_sach_tinh_thanh_pho | filter: tim_kiem_<?= $ban_ghi_cap_nhat ?>_id_tinh">{{ban_ghi.ten_dia_diem}}</option>
  </select>
</div>