<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/'.$module.'.js');
?>
<div class="container-fluid" ng-controller="<?= $module?>_controller">
<div class="tong_quat_page" ng-controller="tong_quat_controller">
  
  <?php if(isset($module_sub) && $module_sub):?>
  <div class="<?= $module?>_page" ng-controller="<?= $module?>_sub_controller">
  <?php endif;?>
  
  <h1 class="text-center"><?= $tieu_de ?></h1>
  <div class="row">
    <div class="col-md-<?= isset($kich_co) ? $kich_co : 8?>">
      <?php $c->view('tong_quat/them', $data)?>
      <?php $c->view('tong_quat/loc', $data)?>
      <?php $c->view('tong_quat/sua', $data)?>
      <?php $c->view('tong_quat/danh_sach', $data)?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>

  <?php if(isset($module_sub) && $module_sub):?>
  </div>
  <?php endif;?>

</div>
</div>