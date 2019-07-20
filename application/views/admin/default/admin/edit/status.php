<div class="form-group">
	<label><?= $setting['label']?></label>
	<div ng-class="{'bg-primary': item.<?= $setting['index']?>, 'bg-dark': !item.<?= $setting['index']?>}" 
			class="form-control text-left text-white font-weight-bold" ng-click="item.<?= $setting['index']?> = !item.<?= $setting['index']?>">
		<span class="fa" ng-class="{'fa-check-square-o': item.<?= $setting['index']?>, 'fa-square-o': !item.<?= $setting['index']?>}"></span> {{item.<?= $setting['index']?> ? '<?= isset($setting['enabled'])?$setting['enabled']: 'Bật'?>': '<?= isset($setting['disabled'])?$setting['disabled']: 'Tắt'?>'}}
	</div>
</div>