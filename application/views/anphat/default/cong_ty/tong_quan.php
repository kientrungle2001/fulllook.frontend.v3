<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/cong_ty.js');
?>
<div class="container-fluid" ng-controller="cong_ty_controller">
<div class="cong_ty_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">công ty</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('cong_ty/them')?>
      <?php $c->view('cong_ty/sua')?>
      <?php $c->view('cong_ty/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>