<h1>Tư vấn</h1>
<table class="table table-hover">
  <tr>
    <th>Ngày tư vấn</th>
    <th>Nội dung tư vấn</th>
    <th>Người tư vấn</th>
    <th>Khóa học</th>
    <th>Môn</th>
    <th>Trạng thái</th>
  </tr>
  <tr ng-repeat="tu_van in danh_sach_tu_van">
    <td>{{tu_van.time}}</td>
    <td>{{tu_van.content}}</td>
    <td>{{tu_van.adviceName}}</td>
    <td>{{tu_van.className}}</td>
    <td>{{tu_van.subjectName}}</td>
    <td>{{tu_van.status}}</td>
  </tr>
</table>