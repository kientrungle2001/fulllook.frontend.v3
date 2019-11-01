<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/<?= $module?>.js');
?>
<div class="container-fluid" ng-controller="<?= $module?>_controller">
<div class="tong_quat_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">$title</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('tong_quat/them', $data)?>
      <?php $c->view('tong_quat/sua', $data)?>
      <?php $c->view('tong_quat/danh_sach', $data)?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>