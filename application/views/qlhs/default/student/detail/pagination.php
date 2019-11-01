<div class="pagination">
  <select ng-model="pageSize" ng-change="tai_danh_sach()">
    <option ng-repeat="size in pageSizes" ng-value="size" ng-selected="pageSize === size">{{size}}</option>
  </select>
  &nbsp; Page &nbsp; <input style="width: 40px;" type="number" ng-model="pageNum" ng-change="tai_danh_sach()"> &nbsp; /&nbsp; {{pages}}
</div>