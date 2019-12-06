<div class="container-fluid" ng-controller="cong_ty_chi_tiet_controller">
  <h1>Chi tiết công ty <a class="text-primary fs-16" href="/cong_ty/danh_sach">Quay lại danh sách</a></h1>
  <hr>
  <div class="row">
    <div class="col-md-4 mb-3">
      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="thong_tin_cong_ty-tab" data-toggle="tab" href="#thong_tin_cong_ty" role="tab" aria-controls="thong_tin_cong_ty" aria-selected="true">Thông tin công ty</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="thong_tin_nguoi_lien_he-tab" data-toggle="tab" href="#thong_tin_nguoi_lien_he" role="tab" aria-controls="thong_tin_nguoi_lien_he" aria-selected="true">Thông tin liên hệ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="thong_tin_han-tab" data-toggle="tab" href="#thong_tin_han" role="tab" aria-controls="thong_tin_han" aria-selected="false">Thông tin hạn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="thong_tin_cuoc_goi-tab" data-toggle="tab" href="#thong_tin_cuoc_goi" role="tab" aria-controls="thong_tin_cuoc_goi" aria-selected="false">Cuộc gọi</a>
        </li>
      </ul>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-20">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="thong_tin_cong_ty" role="tabpanel" aria-labelledby="thong_tin_cong_ty-tab">
          <h2>Thông tin công ty</h2>
          <div class="row">
            <div class="col-md-2 font-weight-bold">Tên công ty</div>
            <div class="col-md-6">{{cong_ty.ten_cong_ty}}</div>
            <div class="col-md-2 font-weight-bold">Mã số thuế</div>
            <div class="col-md-6">{{cong_ty.ma_so_thue}}</div>
            <div class="col-md-2 font-weight-bold">Ngày liên hệ</div>
            <div class="col-md-6">{{cong_ty.ngay_lien_he}}</div>
          </div>
          <div class="row">
            <div class="col-md-2 font-weight-bold">Địa chỉ</div>
            <div class="col-md-6">{{cong_ty.dia_chi}}</div>
            <div class="col-md-2 font-weight-bold">Tỉnh thành</div>
            <div class="col-md-6">{{tinh.ten_dia_diem}}</div>
            <div class="col-md-2 font-weight-bold">Quận huyện</div>
            <div class="col-md-6">{{huyen.ten_dia_diem}}</div>
          </div>
          <div class="row">
            <div class="col-md-2 font-weight-bold">Nhân viên</div>
            <div class="col-md-6">{{nhan_vien.ten_nhan_vien}}</div>
            <div class="col-md-2 font-weight-bold">Nhà cung cấp</div>
            <div class="col-md-6">{{nha_cung_cap.ten_nha_cung_cap}}</div>
            <div class="col-md-2 font-weight-bold">Loại danh sách</div>
            <div class="col-md-6">{{loai_danh_sach.ten_loai_danh_sach}}</div>
          </div>

          <div class="row">
            <div class="col-md-2 font-weight-bold">Danh sách khai thác</div>
            <div class="col-md-6">{{danh_sach_khai_thac.ten_danh_sach_khai_thac}}</div>
            <div class="col-md-2 font-weight-bold">Ngày tạo</div>
            <div class="col-md-6">{{'21/12/2019'}}</div>
            <div class="col-md-2 font-weight-bold">Ngày sửa</div>
            <div class="col-md-6">{{'22/12/2019'}}</div>
          </div>
          
        </div>
        <div class="tab-pane fade" id="thong_tin_nguoi_lien_he" role="tabpanel" aria-labelledby="thong_tin_nguoi_lien_he-tab">
          <h2>Thông tin liên hệ</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Nhân viên</th>
                <th>Hành động</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Nguyên Văn A</td>
                <td>0989123123</td>
                <td>nguyenvana@gmail.com</td>
                <td>TP kế toán</td>
                <td>Nguyễn Văn Hữu</td>
                <td><a href="#" onclick="return false;" class="fa fa-edit"></a> <a href="#" onclick="return false;" class="fa fa-remove text-danger"></a> </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="thong_tin_han" role="tabpanel" aria-labelledby="thong_tin_han-tab">
          <h2>Thông tin hạn</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Nguồn dữ liệu</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>NCC</th>
                <th>Gọi</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Hành động</th>
              </tr>
              <tr>
                <td>1</td>
                <td>BHXH</td>
                <td>11/08/2016</td>
                <td>09/08/2019</td>
                <td>VNPT</td>
                <td>Call</td>
                <td>0663761448</td>
                <td>nguyenvana@gmail.com</td>
                <td><a href="#" onclick="return false;" class="fa fa-edit"></a> <a href="#" onclick="return false;" class="fa fa-remove text-danger"></a> </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="thong_tin_cuoc_goi" role="tabpanel" aria-labelledby="thong_tin_cuoc_goi-tab">
          <h2>Cuộc gọi</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Ngày liên hệ</th>
                <th>Ngày hẹn</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
              <tr>
                <td>1</td>
                <td>Nguyên Văn A</td>
                <td>0989123123</td>
                <td>03/12/2019</td>
                <td>05/12/2019</td>
                <td>Hẹn trao đổi nội dung hợp đồng chữ ký số</td>
                <td>Hẹn</td>
                <td><a href="#" onclick="return false;" class="fa fa-edit"></a> <a href="#" onclick="return false;" class="fa fa-remove text-danger"></a> </td>
              </tr>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- /.col-md-8 -->
  </div>
</div>
<!-- /.container -->

<script>
anphatApp.controller('cong_ty_chi_tiet_controller', ['$scope', function($scope){
  $scope.cong_ty = <?= json_encode($cong_ty);?>;
  $scope.nhan_vien = <?= json_encode($cong_ty['nhan_vien']);?>;
  $scope.tinh = <?= json_encode($cong_ty['tinh']);?>;
  $scope.huyen = <?= json_encode($cong_ty['huyen']);?>;
  $scope.nha_cung_cap = <?= json_encode($cong_ty['nha_cung_cap']);?>;
  $scope.loai_danh_sach = <?= json_encode($cong_ty['loai_danh_sach']);?>;
  $scope.danh_sach_khai_thac = <?= json_encode($cong_ty['danh_sach_khai_thac']);?>;
}]);
</script>