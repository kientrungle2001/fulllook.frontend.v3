<div class="form-group">
	<label><?= $setting['label']?></label>
	<select ng-multiple="<?= isset($setting['multiple'])?$setting['multiple']: 'false' ?>" ui-select2="<?= isset($setting['select2Options'])?$setting['select2Options']: 'singleSelect2Options' ?>" class="form-control" ng-model="item.<?= $setting['index']?>" <?= isset($setting['multiple']) ? 'multiple':''?> <?= isset($setting['size']) ? 'size="'.$setting['size'].'"':''?>>
		<option value=""><?= $setting['label']?></option>
		<?php
		if(isset($setting['options'])) { 
			foreach($setting['options'] as $option) { ?>
		<option ng-value="<?= $option['value']?>"><?= $option['label']?></option>		
		<?php
			} 
		}
		?>
		<?php
		if(isset($setting['table'])) {
			if(!isset($setting['fields'])) $setting['fields'] = '*';
			$controller->db->select($setting['fields']);
			if(isset($setting['where']))
				$controller->db->where($setting['where']);
			if(isset($setting['sort']))
			$controller->db->order_by($setting['sort']);
			$items = $controller->db->get($setting['table'])->result_array();
			foreach($items as $item) { ?>
		<option ng-value="<?= $item[$setting['valueField']]?>"><?= $item[$setting['labelField']]?></option>
		<?php
			}
		}
		?>
	</select>
</div>