<table class="table table-hover">
  <tr>
    <th>Ngày tư vấn</th>
    <th>Nội dung tư vấn</th>
    <th>Người tư vấn</th>
    <th>Khóa học</th>
    <th>Môn</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
  </tr>
  <tr ng-repeat="advice in advices">
    <td>{{advice.time}}</td>
    <td>{{advice.content}}</td>
    <td>{{advice.adviceName}}</td>
    <td>{{advice.className}}</td>
    <td>{{advice.subjectName}}</td>
    <td>{{advice.status}}</td>
    <td><a href="#" class="fa fa-edit" onclick="return false" ng-click="edit_advice(advice)"></a> <a href="#" class="fa fa-remove text-danger" onclick="return false;" ng-click="remove_advice(advice)"></a></td>
  </tr>
</table>