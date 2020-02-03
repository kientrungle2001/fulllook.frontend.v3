<?php
$c->js('factories/tong_quat/phan_trang.js');
$c->js('factories/tong_quat/them_sua_xoa.js'); 
$c->js('factories/tong_quat/danh_sach.js');
$c->js('factories/tong_quat/tham_chieu.js');
$c->js('factories/tong_quat/bo_loc.js');
$c->js('factories/tong_quat/hanh_dong.js');
$c->js('factories/tong_quat/tai_tu_dong.js'); 
$c->js('factories/tong_quat/bo_thuoc_tinh.js'); 
$c->js('controller/tong_quat.js');
$c->js('controller/'.$module.'.js');
?>
<div class="container-fluid" ng-controller="<?= $module?>_controller">
<?php if(isset($du_lieu_tai_tu_dong)):?>
<span class="d-none" ng-init="du_lieu_tai_tu_dong=<?= htmlentities(json_encode($du_lieu_tai_tu_dong)) ?>;"></span>
<?php endif;?>
<?php if(isset($du_lieu_tinh)):?>
<span class="d-none" ng-init="du_lieu_tinh=<?= htmlentities(json_encode($du_lieu_tinh)) ?>;"></span>
<?php endif;?>
<?php if(isset($id_luoc_do)):?>
<span class="d-none" ng-init="id_luoc_do=<?= htmlentities(json_encode($id_luoc_do)) ?>;"></span>
<?php endif;?>
<span class="d-none" ng-init="truong_danh_sach=<?= htmlentities(json_encode($truong_danh_sach)) ?>;"></span>
<span class="d-none" ng-init="truong_them_sua=<?= htmlentities(json_encode($truong_them_sua)) ?>;"></span>
<span class="d-none" ng-init="truong_loc=<?= htmlentities(json_encode($truong_loc)) ?>;"></span>
<h1 class="text-center"><?= $tieu_de ?></h1>
  <div class="tong_quat_page" ng-controller="tong_quat_controller">
  <div class="row">
    <div class="col-md-<?= isset($kich_co) ? $kich_co : 8?>">
      <button class="btn btn-primary" ng-click="lap_chi_muc()">Make Index</button>
      <?php $c->view('tong_quat/them', $data)?>
      <?php $c->view('tong_quat/loc', $data)?>
      <?php $c->view('tong_quat/sua', $data)?>
      <?php $c->view('tong_quat/danh_sach', $data)?>
      <?php $c->view('tong_quat/modal_chon_bo_thuoc_tinh', $data)?>
    </div>
    <div class="col-md-8">
    &nbsp;
    </div>
  </div>
</div>
</div>