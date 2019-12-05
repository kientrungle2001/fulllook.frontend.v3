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
            <div class="col-md-6">{{cong_ty.id_tinh}}</div>
            <div class="col-md-2 font-weight-bold">Quận huyện</div>
            <div class="col-md-6">{{cong_ty.id_huyen}}</div>
          </div>
          <div class="row">
            <div class="col-md-2 font-weight-bold">Nhân viên</div>
            <div class="col-md-6">{{cong_ty.id_nhan_vien}}</div>
            <div class="col-md-2 font-weight-bold">&nbsp;</div>
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2 font-weight-bold">&nbsp;</div>
            <div class="col-md-6">&nbsp;</div>
          </div>
          
        </div>
        <div class="tab-pane fade" id="thong_tin_nguoi_lien_he" role="tabpanel" aria-labelledby="thong_tin_nguoi_lien_he-tab">
          <h2>Thông tin liên hệ</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
        </div>
        <div class="tab-pane fade" id="thong_tin_han" role="tabpanel" aria-labelledby="thong_tin_han-tab">
          <h2>Thông tin hạn</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
        </div>
        <div class="tab-pane fade" id="thong_tin_cuoc_goi" role="tabpanel" aria-labelledby="thong_tin_cuoc_goi-tab">
          <h2>Cuộc gọi</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

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
}]);
</script>