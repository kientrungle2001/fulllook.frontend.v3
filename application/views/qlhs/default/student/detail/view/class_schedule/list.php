<table class="table table-hover">
  <tr>
    <th>Tên lớp</th>
    <th>Môn học</th>
    <th>Ngày vào học</th>
    <th>Ngày dừng học</th>
    <th>Hành động</th>
  </tr>
  <tr ng-repeat="xep_lop in danh_sach_xep_lop">
    <td>{{xep_lop.className}}</td>
    <td>{{xep_lop.subjectName}}</td>
    <td>{{xep_lop.startClassDate}}</td>
    <td>{{xep_lop.endClassDate}}</td>
    <td><span class="fa fa-trash text-danger"></span></td>
  </tr>
</table>