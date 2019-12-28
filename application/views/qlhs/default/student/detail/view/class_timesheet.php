<h1>Thời khóa biểu</h1>
<table class="table table-sm table-hover">
    <tr>
        <th>Lớp</th>
        <th>Ngày học</th>
        <th>Trạng thái</th>
    </tr>
    <tr ng-repeat="schedule in schedules">
        <td>{{schedule.className}}</td>
        <td>{{schedule.studyDate}}</td>
        <td>{{schedule.status}}</td>
    </tr>
</table>