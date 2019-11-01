<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/chuc_vu.js');
?>
<div class="container-fluid" ng-controller="chuc_vu_controller">
<div class="chuc_vu_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">Chức vụ</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('chuc_vu/them')?>
      <?php $c->view('chuc_vu/sua')?>
      <?php $c->view('chuc_vu/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>