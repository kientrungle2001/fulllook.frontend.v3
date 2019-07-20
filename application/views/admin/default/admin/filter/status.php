<div class="form-group">
<label><?= $setting['label']?></label>
	<select ng-model="filter_data.<?= $setting['index']?>" class="form-control"
		placeholder="<?= $setting['label']?>" ng-change="reload()">
		<option ng-value=""><?= $setting['label']?></option>
		<option ng-value="1">Đã kích hoạt</option>
		<option ng-value="0">Chưa kích hoạt</option>
	</select>
</div>