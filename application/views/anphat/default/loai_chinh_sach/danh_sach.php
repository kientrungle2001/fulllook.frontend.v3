
<table class="table table-sm table-bordered">
  <tr>
    <th>ID</th>
    <th>Tên loại chính sách</th>
    <th>Mã loại chính sách</th>
    <th><span class="fa fa-circle"></span></th>
    <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
    <th>DS nhân viên</th>
  </tr>
  <tr ng-repeat="ban_ghi in danh_sach_ban_ghi">
    <td>{{$index + 1}}</td>
    <td>{{ban_ghi.ten_loai_chinh_sach}}</td>
    <td>{{ban_ghi.ma_loai_chinh_sach}}</td>
    <td><a href="#" class="fa fa-circle" 
      ng-class="{'text-success': ban_ghi.trang_thai, 'text-dark': !ban_ghi.trang_thai}" 
      ng-click="thay_doi_trang_thai(ban_ghi)"></a></td>
    <td>
      <a href="#" class="fa fa-pencil text-primary" ng-click="mo_dialog_sua_ban_ghi(ban_ghi, 'loai_chinh_sach_modal')"></a>
      <a href="#" class="fa fa-trash text-danger" ng-click="xoa_ban_ghi(ban_ghi)"></a>
    </td>
    <td><a href="#">DS nhân viên</a></td>
  </tr>
</table>