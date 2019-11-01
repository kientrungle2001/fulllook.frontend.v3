<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/nhan_vien.js');
?>
<div class="container-fluid" ng-controller="nhan_vien_controller">
<div class="nhan_vien_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">Nhân viên</h1>
  <div class="row">
    <div class="col-md-16">
      <?php $c->view('nhan_vien/them')?>
      <?php $c->view('nhan_vien/sua')?>
      <?php $c->view('nhan_vien/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>