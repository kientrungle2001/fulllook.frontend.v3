<div class="form-group" ng-init="filter_data.<?= $setting['index']?> = null">
	<label><?= $setting['label']?></label>
	<div class="btn-group btn-block" role="group" aria-label="Switch">
  <button type="button" class="btn" ng-click="filter_data.<?= $setting['index']?>=1; reload();" 
			ng-class="{'btn-primary active':filter_data.<?= $setting['index']?> == 1, 
				'btn-secondary': filter_data.<?= $setting['index']?> !== 1}">ON</button>
  <button type="button" class="btn" ng-click="filter_data.<?= $setting['index']?>=null; reload();" 
			ng-class="{'btn-primary active':filter_data.<?= $setting['index']?> === null, 
				'btn-secondary': filter_data.<?= $setting['index']?> !== null}">N/A</button>
  <button type="button" class="btn" ng-click="filter_data.<?= $setting['index']?>=0; reload();" 
			ng-class="{'btn-primary active':filter_data.<?= $setting['index']?> == 0, 
				'btn-secondary': filter_data.<?= $setting['index']?> !== 0}">OFF</button>
	</div>
</div>