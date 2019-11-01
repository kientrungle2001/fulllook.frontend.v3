<?= $c->view('student/detail/pagination')?>
<table class="table table-sm table-hover">
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)" ng-repeat-start="row in rows">
    <td class="text-nowrap"><a href="#" ng-click="toggle_detail_row(row)">[{{open_sign_row(row)}}]</a> {{row.name}}</td>
    <td>{{row.phone}}</td>
    <td>{{row.note}}</td>
    <td>{{row.startStudyDate | vndate}}</td>
    <td class="text-nowrap"><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
    ng-show="is_detail_visible(row)">
    <td colspan="4"> |____ Lớp Tiếng Việt 5C9K8 (T7 19/10- 8h30-10h30)</td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
      ng-show="is_detail_visible(row)">
    <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;|____ Tháng 7 và 8 năm 2019</td>
    <td>18/8/2019</td>
  </tr>
  <tr ng-class="{'table-active': is_selected_row(row), 'table-inactive': !is_selected_row(row)}" ng-click="select_row(row)"
  ng-show="is_detail_visible(row)"
   ng-repeat-end>
    <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;|____ Tháng 9 và 10 năm 2019</td>
    <td>18/10/2019</td>
  </tr>
</table>
<?= $c->view('student/detail/pagination')?>