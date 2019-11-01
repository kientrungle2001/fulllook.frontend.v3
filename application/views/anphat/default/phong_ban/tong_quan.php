<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/phong_ban.js');
?>
<div class="container-fluid" ng-controller="phong_ban_controller">
<div class="phong_ban_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">phòng ban</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('phong_ban/them')?>
      <?php $c->view('phong_ban/sua')?>
      <?php $c->view('phong_ban/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>