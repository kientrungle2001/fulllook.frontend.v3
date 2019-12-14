<h1>Thời khóa biểu</h1>
<table class="table table-sm table-hover">
    <tr>
        <th>Lớp</th>
        <th>Ngày học</th>
        <th>Trạng thái</th>
    </tr>
    <tr ng-repeat="student_schedule in student_schedules">
        <td>{{student_schedule.className}}</td>
        <td>{{student_schedule.studyDate}}</td>
        <td>{{student_schedule.status}}</td>
    </tr>
</table>