<div class="pagination">
  <select ng-model="pageSize" ng-change="get_list()">
    <option ng-repeat="size in pageSizes" ng-value="size" ng-selected="pageSize === size">{{size}}</option>
  </select>
  &nbsp; Page &nbsp; <input style="width: 40px;" type="number" ng-model="pageNum" ng-change="get_list()"> &nbsp; /&nbsp; {{pages}}

  <div>
  &nbsp;
  <a href="#" class="fa fa-fast-backward" ng-click="go_to_first()"></a>&nbsp;
  <a href="#" class="fa fa-backward" ng-click="go_to_prev()"></a>&nbsp;
  <a href="#" class="fa fa-forward" ng-click="go_to_next()"></a>&nbsp;
  <a href="#" class="fa fa-fast-forward" ng-click="go_to_last()"></a>&nbsp;
  <a href="#" class="fa fa-refresh" ng-click="get_list()"></a>
  </div>
</div>