<div class="form-group col-md-<?= $kich_co ? $kich_co: ($size? $size: 12) ?>">
  <select class="form-control" ng-model="<?= $model? $model : $index ?>" placeholder="<?= $tieu_de?$tieu_de: $label ?>">
    <option ng-value="null"><?= $tieu_de?$tieu_de: $label ?></option>
    <option ng-value="<?= $option_value?>" ng-repeat="<?= $repeat?>">{{<?= $option_label?>}}</option>
  </select>
</div>