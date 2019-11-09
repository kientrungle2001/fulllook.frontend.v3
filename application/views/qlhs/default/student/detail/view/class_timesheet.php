<h1>Thời khóa biểu</h1>
<table class="table table-sm table-hover">
    <tr>
        <th>Lớp</th>
        <th>Ngày học</th>
        <th>Trạng thái</th>
    </tr>
    <tr ng-repeat="thoi_khoa_bieu in danh_sach_thoi_khoa_bieu">
        <td>{{thoi_khoa_bieu.className}}</td>
        <td>{{thoi_khoa_bieu.studyDate}}</td>
        <td>{{thoi_khoa_bieu.status}}</td>
    </tr>
</table>