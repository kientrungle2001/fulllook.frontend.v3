<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/loai_chinh_sach.js');
?>
<div class="container-fluid" ng-controller="loai_chinh_sach_controller">
<div class="loai_chinh_sach_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">loại chính sách</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('loai_chinh_sach/them')?>
      <?php $c->view('loai_chinh_sach/sua')?>
      <?php $c->view('loai_chinh_sach/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>