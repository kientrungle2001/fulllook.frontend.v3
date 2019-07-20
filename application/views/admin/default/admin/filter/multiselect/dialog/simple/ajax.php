<div class="form-group">
	<label><?= $setting['label']?></label>
	<button ng-click="load_filter_select('<?= $setting['index']?>')" 
		class="btn btn-primary btn-block" 
		><?= $setting['label']?></button>
</div>

<div class="modal" id="modal-<?= $setting['index']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<!-- Header Multiselect -->
			<div class="modal-header">
				<h5 class="modal-title"><?= $setting['label']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Body Multiselect -->
			<div class="modal-body">
				<!-- Search Multiselect -->
				<input class="form-control" 
					ng-init="filter_data_keyword.<?= $setting['index']?>=''" 
					ng-model="filter_data_keyword.<?= $setting['index']?>" 
					placeholder="Tìm kiếm" />
				
				<ul class="list-group">
					<!-- First Options: Tất cả -->
					<li class="list-group-item d-flex justify-content-between align-items-center" 
						ng-class="{'active': filter_data.<?= $setting['index']?>==null}" 
						ng-click="filter_data.<?= $setting['index']?>=null; reload();"><?= $setting['label']?></li>

						<!-- All Options -->
					<?php
					if(isset($setting['options'])) {
						foreach($setting['options'] as $option) { ?>
						<li
							ng-show="filter_data_keyword.<?= $setting['index']?> == '<?= $option['value']?>' 
								|| '<?= $option['label']?>'.toLowerCase()
									.indexOf(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1"
						 class="list-group-item d-flex justify-content-between align-items-center" 
							ng-class="{'active': hasFilterMultiselect('<?= $setting['index']?>','<?= $option['value']?>')}" 
							ng-click="toggleFilterMultiselect('<?= $setting['index']?>','<?= $option['value']?>'); reload();"><?= $option['label']?></li>
						<?php 
						}
					}
					?>
					<?php if(isset($setting['table'])):?>
						<li 
								ng-repeat="item in filter_select_<?= $setting['index']?>"
								ng-show="filter_data_keyword.<?= $setting['index']?> == ''+item.id 
								|| item.<?= $setting['labelField']?>.toLowerCase()
									.indexOf(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item d-flex justify-content-between align-items-center" 
							ng-class="{'active': hasFilterMultiselect('<?= $setting['index']?>', item.<?= $setting['valueField']?>)}" 
							ng-click="toggleFilterMultiselect('<?= $setting['index']?>', item.<?= $setting['valueField']?>); reload();">
							{{item.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{item.id}}</span>
						</li>
						<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
</div>