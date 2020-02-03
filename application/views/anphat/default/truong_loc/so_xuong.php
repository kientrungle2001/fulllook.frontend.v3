<div class="form-group col-md-<?= $kich_co ? $kich_co : ($size ? $size : 12) ?>" <?php if (isset($tham_so) && $tham_so) : ?> ng-init="tai_danh_sach_bo_loc(<?= htmlentities(json_encode($tham_so)) ?>, '<?= $ten_danh_sach ?>')" <?php endif; ?>>
  <label><?= $tieu_de ? $tieu_de : $label ?></label>
  <input class="form-control" type="text" placeholder="Tìm kiếm" ng-model="tim_kiem_bo_loc.<?= $model ? $model : $index ?>" />
  <select class="form-control" 
      ng-model="<?= $model ? $model : $index ?>"
      <?php if(isset($so_sanh)):?>
      ng-init="so_sanh.<?= $model ? $model : $index ?>='<?= $so_sanh?>'"
      <?php endif;?> 
      placeholder="<?= $tieu_de ? $tieu_de : $label ?>" 
      <?php if (isset($tham_so_thay_doi) && $tham_so_thay_doi) : ?> ng-change="tai_danh_sach_bo_loc_thay_doi(<?= htmlentities(json_encode($tham_so_thay_doi)) ?>, '<?= $ten_danh_sach_thay_doi ?>', '<?= $dieu_kien_thay_doi ?>', <?= $model ?>)" <?php endif; ?> 
      <?php if (isset($change) && $change) : ?> ng-change="<?= $change ?>" <?php endif; ?>
        <?php if (isset($chon_nhieu) && $chon_nhieu) : ?> multiple="<?= $chon_nhieu ?>" <?php endif; ?>>
    <option ng-value="null"><?= $tieu_de ? $tieu_de : $label ?></option>
    <option ng-value="<?= $option_value ?>" ng-repeat="<?= $repeat ?> | filter: tim_kiem_bo_loc.<?= $model ? $model : $index ?>">{{<?= $option_label ?>}}</option>
  </select>
</div>