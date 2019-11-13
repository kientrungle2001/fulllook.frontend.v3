<?php 
$c->js('controller/tong_quat.js');
$c->js('controller/'.$module.'.js');
?>
<div class="container-fluid" ng-controller="<?= $module?>_controller">
<?php if(isset($du_lieu_tai_tu_dong)):?>
<span class="d-none" ng-init="du_lieu_tai_tu_dong=<?= htmlentities(json_encode($du_lieu_tai_tu_dong)) ?>;"></span>
<?php endif;?>
<span class="d-none" ng-init="truong_danh_sach=<?= htmlentities(json_encode($truong_danh_sach)) ?>;"></span>
<span class="d-none" ng-init="truong_them_sua=<?= htmlentities(json_encode($truong_them_sua)) ?>;"></span>
<span class="d-none" ng-init="truong_loc=<?= htmlentities(json_encode($truong_loc)) ?>;"></span>
<h1 class="text-center"><?= $tieu_de ?></h1>
  <div class="tong_quat_page" ng-controller="tong_quat_controller">
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
</div>
</div>