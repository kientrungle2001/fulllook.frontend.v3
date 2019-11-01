<table class="table table-sm table-bordered">
  <tr>
    <th>ID</th>
    <th>Tên tỉnh</th>
    <th>Mã tỉnh</th>
    <th><span class="fa fa-circle"></span></th>
    <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
    <th>DS Huyện</th>
  </tr>
  <tr ng-repeat="tinh in danh_sach_tinh">
    <td>{{$index + 1}}</td>
    <td>{{tinh.ten_dia_diem}}</td>
    <td>{{tinh.ma_dia_diem}}</td>
    <td><a href="#" class="fa fa-circle text-success" ng-class="{'text-success': tinh.trang_thai, 'text-dark': !tinh.trang_thai}" ng-click="thay_doi_trang_thai(tinh)"></a></td>
    <td><a href="#" class="fa fa-pencil text-primary"></a> <a href="#" class="fa fa-trash text-danger" ng-click="xoa_dia_diem(tinh)"></a></td>
    <td><a href="#" onclick="return false;" ng-click="tai_danh_sach_huyen(tinh)">DS Huyện</a></td>
  </tr>
</table>