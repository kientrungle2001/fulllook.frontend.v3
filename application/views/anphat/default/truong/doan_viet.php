<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
<label><?= $tieu_de ? $tieu_de : $label ?></label>
  <textarea class="form-control" rows="8" ng-model="<?php if(isset($ban_ghi_cap_nhat)):?><?= $ban_ghi_cap_nhat ?>.<?php endif;?><?= $model? $model : $index ?>" placeholder="<?= $tieu_de?$tieu_de: $label ?>"></textarea>
</div>