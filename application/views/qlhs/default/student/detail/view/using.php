<h1>SP đã sử dụng</h1>
<table class="table table-sm table-hover">
    <tr>
        <th>Tên lớp</th>
        <th>Môn</th>
        <th>Kỳ thanh toán</th>
        <th>Số tiền</th>
        <th>Ngày thanh toán</th>
    </tr>
    <tr ng-repeat="da_su_dung in danh_sach_da_su_dung">
        <td>{{da_su_dung.className}}</td>
        <td>{{da_su_dung.subjectName}}</td>
        <td>{{da_su_dung.payment_periodName}}</td>
        <td>{{da_su_dung.amount}}</td>
        <td>{{da_su_dung.created}}</td>
    </tr>
</table>