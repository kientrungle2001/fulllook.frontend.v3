<h1>Học phí <button class="btn btn-primary" 
  onclick="jQuery('#modal_fee').modal('show')">Thêm</button></h1>
<table class="table table-hover">
  <tr>
    <th>Người thanh toán</th>
    <th>Số điện thoại</th>
    <th>Địa chỉ</th>
    <th>Nội dung</th>
    <th>Số tiền</th>
    <th>Ngày thanh toán</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
  </tr>
  <tr ng-repeat="student_fee in student_fees">
    <td>{{student_fee.name}}</td>
    <td>{{student_fee.phone}}</td>
    <td>{{student_fee.address}}</td>
    <td>{{student_fee.reason}}</td>
    <td>{{student_fee.amount}}</td>
    <td>{{student_fee.created}}</td>
    <td>{{student_fee.status}}</td>
    <td><a href="#" class="fa fa-eye text-success"></a> <a href="#" class="fa fa-remove text-danger"></a></td>
  </tr>
</table>