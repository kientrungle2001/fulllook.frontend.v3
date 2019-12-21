<?= $c->view('teacher/detail/pagination')?>
<table class="table table-sm table-hover">
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)" ng-repeat-start="row in rows">
    <td class="text-nowrap"><a href="#" ng-click="toggle_detail_row(row)">[{{open_sign_row(row)}}]</a> {{row.name}}</td>
    <td>{{row.phone}}</td>
    <td>{{row.note}}</td>
    <td>{{row.startStudyDate | vndate}}</td>
    <td class="text-nowrap"><a href="#" ng-click="edit(row)">Sửa</a> | <a href="#" ng-click="remove(row)">Xóa</a></td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
    ng-show="is_detail_visible(row)" ng-repeat="hoc_phi in order_rows[row.id]">
    <td colspan="2"> |____ {{hoc_phi.reason}}</td>
    <td>{{hoc_phi.created}}</td>
    <td>{{hoc_phi.amount}}</td>
    <td>{{hoc_phi.status}}</td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
      ng-show="false && is_detail_visible(row)">
    <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;|____ Tháng 7 và 8 năm 2019</td>
    <td>18/8/2019</td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
  ng-show="false && is_detail_visible(row)"
   ng-repeat-end>
    <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;|____ Tháng 9 và 10 năm 2019</td>
    <td>18/10/2019</td>
  </tr>
</table>
<?= $c->view('teacher/detail/pagination')?>