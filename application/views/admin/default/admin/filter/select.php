<div class="form-group">
	<label><?= $setting['label']?></label>
	<select ng-model="filter_data.<?= $setting['index']?>" class="form-control"
		placeholder="<?= $setting['label']?>" ng-change="reload()">
		<option ng-value=""><?= $setting['label']?></option>
		<?php if(isset($setting['options'])){
			foreach($setting['options'] as $option) { ?>
				<option value="<?= $option['value']?>"><?= $option['label']?></option>
			<?php 
			}
		}?>
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