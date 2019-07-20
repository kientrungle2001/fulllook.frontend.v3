<div class="form-group">
	<label><?= $setting['label']?></label>
	<button onclick="return false" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-<?= $setting['index']?>"><?= $setting['label']?></button>
</div>

<div class="modal" id="modal-<?= $setting['index']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= $setting['label']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input class="form-control" ng-init="filter_data_keyword.<?= $setting['index']?>=''" ng-model="filter_data_keyword.<?= $setting['index']?>" placeholder="Tìm kiếm" />
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center" ng-class="{'active': filter_data.<?= $setting['index']?>==null}" ng-click="filter_data.<?= $setting['index']?>=null; reload();"><?= $setting['label']?></li>
					<?php
					if(isset($setting['options'])) {
						foreach($setting['options'] as $option) { ?>
						<li
						ng-show="filter_data_keyword.<?= $setting['index']?> == '<?= $option['value']?>' 
								|| '<?= $option['label']?>'.toLowerCase()
									.indexOf(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1"
						 class="list-group-item d-flex justify-content-between align-items-center" 
							ng-class="{'active': filter_data.<?= $setting['index']?>=='<?= $option['value']?>'}" 
							ng-click="filter_data.<?= $setting['index']?>='<?= $option['value']?>'; reload();"><?= $option['label']?></li>
						<?php 
						}
					}
					?>
					<?php if(isset($setting['table'])):?>
					<div ng-repeat="editItem in select_<?= $setting['index']?>">
					<li ng-show="filter_data_keyword.<?= $setting['index']?> == editItem.id 
								|| editItem.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem.<?= $setting['valueField']?>); reload();">
							[1] {{editItem.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem.id}}</span>
							
						</li>
						<div ng-repeat="editItem2 in editItem.children">
							<li 
								ng-show="filter_data_keyword.<?= $setting['index']?> == editItem2.id 
								|| editItem2.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem2.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem2.<?= $setting['valueField']?>); reload();">
							[2] &nbsp;&nbsp;&nbsp;&nbsp;{{editItem2.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem2.id}}</span>
							</li>
							<div ng-repeat="editItem3 in editItem2.children">
							<li
								ng-show="filter_data_keyword.<?= $setting['index']?> == editItem3.id 
								|| editItem3.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem3.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem3.<?= $setting['valueField']?>); reload();">
							[3] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{editItem3.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem3.id}}</span>
							</li>
							<div ng-repeat="editItem4 in editItem3.children">
							<li
								ng-show="filter_data_keyword.<?= $setting['index']?> == editItem4.id 
								|| editItem4.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem4.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem4.<?= $setting['valueField']?>); reload();">
							[4] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{editItem4.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem4.id}}</span>
							</li>
							<div ng-repeat="editItem5 in editItem4.children">
							<li
								ng-show="filter_data_keyword.<?= $setting['index']?> == editItem5.id 
								|| editItem5.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem5.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem5.<?= $setting['valueField']?>); reload();">
							[5] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{editItem5.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem5.id}}</span>
							</li>
							<li ng-repeat="editItem6 in editItem5.children"
								ng-show="filter_data_keyword.<?= $setting['index']?> == editItem6.id 
								|| editItem6.<?= $setting['labelField']?>.toLowerCase()
									.indexOfMatched(filter_data_keyword.<?= $setting['index']?>.toLowerCase()) !== -1" 
							class="list-group-item" 
							ng-class="{'active': item.<?= $setting['index']?>.indexOfMatched(editItem6.<?= $setting['valueField']?>) !== -1}" 
							ng-click="toggleSet(item.<?= $setting['index']?>,editItem6.<?= $setting['valueField']?>); reload();">
							[6] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{editItem5.<?= $setting['labelField']?>}}
							<span class="badge badge-primary badge-pill">#{{editItem6.id}}</span>
							</li>
							</div>
							</div>
							</div>
						</div>
					</div>
				<?php endif;?>
				</ul>
			</div>
		</div>
	</div>
</div>