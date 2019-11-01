<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/danh_sach_khai_thac.js');
?>
<div class="container-fluid" ng-controller="danh_sach_khai_thac_controller">
<div class="danh_sach_khai_thac_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">danh sách khai thác</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('danh_sach_khai_thac/them')?>
      <?php $c->view('danh_sach_khai_thac/sua')?>
      <?php $c->view('danh_sach_khai_thac/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>