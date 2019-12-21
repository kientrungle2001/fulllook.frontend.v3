<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>"
<?php if(isset($tham_so) && $tham_so):?>
  ng-init="tai_danh_sach_bo_loc(<?= htmlentities(json_encode($tham_so)) ?>, '<?= $ten_danh_sach?>')"
<?php endif;?>>
  <select class="form-control" ng-model="<?= $ban_ghi_cap_nhat ?>.<?= $model? $model : $index ?>" placeholder="<?= $tieu_de?$tieu_de: $label ?>"
  <?php if(isset($tham_so_thay_doi) && $tham_so_thay_doi):?>
  ng-change="tai_danh_sach_bo_loc_thay_doi(<?= htmlentities(json_encode($tham_so_thay_doi)) ?>, '<?= $ten_danh_sach_thay_doi?>', '<?= $dieu_kien_thay_doi?>', <?= $ban_ghi_cap_nhat ?>.<?= $model?>)"
<?php endif;?>>
    <option ng-value="null"><?= $tieu_de?$tieu_de: $label ?></option>
    <option ng-value="<?= $option_value?>" ng-repeat="<?= $repeat?>">{{<?= $option_label?>}}</option>
  </select>
</div>