<?php $controller->js('controller/dia_diem.js')?>
<div class="container-fluid" ng-controller="dia_diem_controller">
  <h1 class="text-center">Địa điểm</h1>
  <div class="row">
    <div class="col-md-8">
      <h4 class="text-center">Tỉnh/thành phố</h4>
      <?php $controller->view('dia_diem/tinh/them');?>
      <?php $controller->view('dia_diem/tinh/danh_sach');?>
    </div>
    <div class="col-md-8">
      <h4 class="text-center">Quận/Huyện của tỉnh/TP {{tinh_dang_chon.ten_dia_diem}}</h4>
      <?php $controller->view('dia_diem/huyen/them');?>
      <?php $controller->view('dia_diem/huyen/danh_sach');?>
    </div>
  </div>
</div>