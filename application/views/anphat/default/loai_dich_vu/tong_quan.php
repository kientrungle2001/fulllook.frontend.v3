<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/loai_dich_vu.js');
?>
<div class="container-fluid" ng-controller="loai_dich_vu_controller">
<div class="loai_dich_vu_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">loại dịch vụ</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('loai_dich_vu/them')?>
      <?php $c->view('loai_dich_vu/sua')?>
      <?php $c->view('loai_dich_vu/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>