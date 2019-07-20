<div class="form-group" ng-init="filter_data.<?= $setting['index']?> = filter_data.<?= $setting['index']?> || null">
	<label><?= $setting['label']?></label>
  <button type="button" class="btn btn-block" ng-click="toggleFilterStatus('<?= $setting['index']?>'); reload();" 
			ng-class="{'btn-success':filter_data.<?= $setting['index']?> === 1, 
				'btn-danger': filter_data.<?= $setting['index']?> === 0, 'btn-secondary': filter_data.<?= $setting['index']?> === null}"> {{getFilterStatusLabel('<?= $setting['index']?>')}} </button>
</div>