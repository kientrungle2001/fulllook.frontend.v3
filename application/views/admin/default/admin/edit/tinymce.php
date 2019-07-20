<div class="form-group">
	<label><?= $setting['label']?></label>
	<textarea ui-tinymce="tinymceOptions" class="form-control tinymce" ng-model="item.<?= $setting['index']?>" rows="<?= $setting['size']?>"></textarea>
</div>