<div class="row">
  <div class="col-md-<?= isset($kich_co_nut_them)?$kich_co_nut_them: 12 ?>">
    <button class="btn btn-primary form-control" ng-click="mo_dialog_them_ban_ghi('them_<?= $module?>_modal')">Thêm <?= $tieu_de?></button>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_loc)?$kich_co_nut_loc: 12 ?>">
    <button class="btn btn-success form-control" ng-class="{'active': hien_thi_bo_loc}" ng-click="chuyen_doi_hien_thi_bo_loc()">Lọc <?= $tieu_de?></button>
  </div>
</div>
<div class="row mt-3" ng-show="hien_thi_bo_loc">
<form class="col-md-24">
  <div class="form-row">
    <?php $bo_loc = ( isset($bo_loc) && $bo_loc ) ? $bo_loc : 'bo_loc'?>
    <?php foreach($truong_loc as $truong):
      $truong['bo_loc'] = $bo_loc;
      $c->view('truong_loc/' . $truong['loai_truong_loc'], $truong);
      endforeach;?>
  </div>
</form>
</div>