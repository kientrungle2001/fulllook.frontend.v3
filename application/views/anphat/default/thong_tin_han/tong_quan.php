<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/thong_tin_han.js');
?>
<div class="container-fluid" ng-controller="thong_tin_han_controller">
<div class="thong_tin_han_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">thông tin hạn</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('thong_tin_han/them')?>
      <?php $c->view('thong_tin_han/sua')?>
      <?php $c->view('thong_tin_han/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>