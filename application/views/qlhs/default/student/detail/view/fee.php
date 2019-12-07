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
  <tr ng-repeat="hoc_phi in danh_sach_hoc_phi">
    <td>{{hoc_phi.name}}</td>
    <td>{{hoc_phi.phone}}</td>
    <td>{{hoc_phi.address}}</td>
    <td>{{hoc_phi.reason}}</td>
    <td>{{hoc_phi.amount}}</td>
    <td>{{hoc_phi.created}}</td>
    <td>{{hoc_phi.status}}</td>
    <td><a href="#" class="fa fa-eye text-success"></a> <a href="#" class="fa fa-remove text-danger"></a></td>
  </tr>
</table>