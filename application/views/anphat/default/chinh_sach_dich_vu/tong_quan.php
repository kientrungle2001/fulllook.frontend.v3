<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/chinh_sach_dich_vu.js');
?>
<div class="container-fluid" ng-controller="chinh_sach_dich_vu_controller">
<div class="chinh_sach_dich_vu_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">chính sách dịch vụ</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('chinh_sach_dich_vu/them')?>
      <?php $c->view('chinh_sach_dich_vu/sua')?>
      <?php $c->view('chinh_sach_dich_vu/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>