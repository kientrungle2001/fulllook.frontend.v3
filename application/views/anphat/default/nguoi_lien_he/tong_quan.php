<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/nguoi_lien_he.js');
?>
<div class="container-fluid" ng-controller="nguoi_lien_he_controller">
<div class="nguoi_lien_he_page" ng-controller="tong_quat_controller">
  <h1 class="text-center">người liên hệ</h1>
  <div class="row">
    <div class="col-md-8">
      <?php $c->view('nguoi_lien_he/them')?>
      <?php $c->view('nguoi_lien_he/sua')?>
      <?php $c->view('nguoi_lien_he/danh_sach')?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>