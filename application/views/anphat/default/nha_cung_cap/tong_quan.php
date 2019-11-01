<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/nha_cung_cap.js');
?>
<div class="container-fluid" ng-controller="nha_cung_cap_controller">
<div class="nha_cung_cap_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">nhà cung cấp</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('nha_cung_cap/them')?>
      <?php $c->view('nha_cung_cap/sua')?>
      <?php $c->view('nha_cung_cap/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>