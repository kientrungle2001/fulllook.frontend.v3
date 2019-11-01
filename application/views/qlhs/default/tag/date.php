<div class="row">
  <div class="col-md-8">
    <select class="form-control" ng-model="<?= $model?>.day">
      <?php for($i = 0; $i < 31; $i++):?>
        <option ng-value="<?= $i+1?>"><?= $i+1?></option>
      <?php endfor;?>
    </select>
  </div>
  <div class="col-md-8">
    <select class="form-control" ng-model="<?= $model?>.month">
      <?php for($i = 0; $i < 12; $i++):?>
        <option ng-value="<?= $i+1?>">Tháng <?= $i+1?></option>
      <?php endfor;?>
    </select>
  </div>
  <div class="col-md-8">
    <input type="number" class="form-control" ng-model="<?= $model?>.year">
  </div>
</div>