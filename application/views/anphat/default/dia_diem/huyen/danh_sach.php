<table class="table table-sm table-bordered">
  <tr>
    <th>ID</th>
    <th>Tên huyện</th>
    <th>Mã huyện</th>
    <th>Tỉnh</th>
    <th><span class="fa fa-circle"></span></th>
    <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
  </tr>
  <tr ng-repeat="huyen in danh_sach_huyen">
    <td>{{$index + 1}}</td>
    <td>{{huyen.ten_dia_diem}}</td>
    <td>{{huyen.ma_dia_diem}}</td>
    <td>{{tinh_dang_chon.ten_dia_diem}}</td>
    <td><a href="#" class="fa fa-circle text-success" ng-class="{'text-success': huyen.trang_thai, 'text-dark': !huyen.trang_thai}" ng-click="thay_doi_trang_thai(huyen)"></a></td>
    <td><a href="#" class="fa fa-pencil text-primary"></a> <a href="#" class="fa fa-trash text-danger" ng-click="xoa_dia_diem(huyen)"></a></td>
  </tr>
</table>