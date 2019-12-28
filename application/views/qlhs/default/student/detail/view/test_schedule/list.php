<table class="table table-hover">
  <tr>
  <th>ID</th>
  <th>Lớp</th>
  <th>Điểm</th>
  <th>Nhận xét</th>
  <th>Ngày</th>
  </tr>
  <tr ng-repeat="test_schedule in test_schedules">
  <td>{{test_schedule.id}}</td>
  <td>{{test_schedule.classId}}</td>
  <td>{{test_schedule.mark}}</td>
  <td style="white-space: pre-line">{{test_schedule.note}}
<a href="#" onclick="return false;" ng-click="edit_test_schedule(test_schedule)">Sửa</a> | <a href="#" onclick="return false;" ng-click="remove_test_schedule(test_schedule)">Xóa</a>
</td>
  <td>{{test_schedule.testDate}}</td>
  </tr>
</table>