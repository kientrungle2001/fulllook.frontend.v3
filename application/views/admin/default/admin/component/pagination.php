<form class="form-inline">
	<strong>Số mục: </strong> 
	<select name="pageSize"
		class="pageSize" ng-model="pageSize" ng-change="reload()">
		<option ng-value="ps" ng-repeat="ps in pageSizes">{{ps}}</option>
	</select>
	
	<button ng-click="gotoFirst()" class="btn">|<</button>
	<button ng-click="gotoPrev()" class="btn"><<</button>
	<strong>Trang: </strong> 
	
	<select name="pageNum" ng-model="pageNum" ng-change="reload()" ng-show="total_pages <= 10">
		<option ng-value="null">Trang</option>
		<?php for($i = 0; $i < 10; $i++):?>
		<option ng-value="<?= $i?>" ng-show="total_pages > <?= $i?>"><?= $i+1?></option>
		<?php endfor?>		
	</select>
	<input ng-model="pageNum" ng-change="reload()" size="3" ng-show="total_pages > 10"/> / {{total_pages}} trang,
	({{total}} bản ghi)
	<button ng-click="gotoNext()" class="btn">>></button>
	<button ng-click="gotoLast()" class="btn">>|</button>
</form>