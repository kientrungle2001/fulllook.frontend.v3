<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
  <textarea class="form-control" ng-model="<?php if(isset($ban_ghi_cap_nhat)):?><?= $ban_ghi_cap_nhat ?>.<?php endif;?><?= $model? $model : $index ?>" placeholder="<?= $tieu_de?$tieu_de: $label ?>"></textarea>
</div>