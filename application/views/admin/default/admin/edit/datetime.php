<div class="form-group">
	<label><?= $setting['label']?></label>
	<input type="<?= $setting['type']?>" class="form-control" ng-init="item.<?= $setting['index']?> = toDate(item.<?= $setting['index']?>)" ng-model="item.<?= $setting['index']?>" />
</div>