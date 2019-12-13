<div class="row">
  <div class="col-md-<?= isset($kich_co_nut_loc) ? $kich_co_nut_loc : 12 ?>">
    <form>
      <div class="input-group mb-2">
        <input type="text" class="form-control form-control-sm" placeholder="Từ khóa" ng-model="tu_khoa">
        <div class="input-group-prepend">
          <button class="input-group-text" ng-click="tai_danh_sach()"><span class="fa fa-search"></span></button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_them) ? $kich_co_nut_them : 12 ?>">
    <button class="btn btn-primary btn-sm form-control" <?php if (isset($model_nut_them) && $model_nut_them) : ?>ng-click="<?= $model_nut_them ?>" <?php else : ?>ng-click="mo_dialog_them_ban_ghi('them_<?= $module ?>_modal')" <?php endif; ?>>Thêm <?= $tieu_de ?></button>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_loc) ? $kich_co_nut_loc : 12 ?>">
    <a class="btn btn-success btn-sm form-control" ng-class="{'active': hien_thi_bo_loc}" ng-click="chuyen_doi_hien_thi_bo_loc()" href="#" onclick="return false;">Lọc <?= $tieu_de ?></a>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_loc) ? $kich_co_nut_loc : 12 ?>">
    <a class="btn btn-dark btn-sm form-control" <?php if (isset($model_nut_nhap_du_lieu) && $model_nut_nhap_du_lieu) : ?>ng-click="<?= $model_nut_nhap_du_lieu ?>" <?php endif ?> href="#" onclick="return false;">Nhập <?= $tieu_de ?></a>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_loc) ? $kich_co_nut_loc : 12 ?>">
    <a class="btn btn-dark btn-sm form-control" <?php if (isset($model_nut_xuat_du_lieu) && $model_nut_xuat_du_lieu) : ?>ng-click="<?= $model_nut_xuat_du_lieu ?>" <?php endif ?> href="#" onclick="return false;">Xuất <?= $tieu_de ?></a>
  </div>
  <div class="col-md-<?= isset($kich_co_nut_loc) ? $kich_co_nut_loc : 12 ?>">
    <select class="btn btn-primary btn-sm" ng-model="sap_xep" ng-change="tai_danh_sach()">
      <option ng-value="sx.ten_truong" ng-repeat="sx in thu_tu_sap_xep">{{sx.tieu_de}}</option>
    </select>
    <select class="btn btn-primary btn-sm" ng-model="thu_tu" ng-change="tai_danh_sach()">
      <option value="asc">Tăng</option>
      <option value="desc">Giảm</option>
    </select>
  </div>
</div>
<div class="row mt-3" ng-show="hien_thi_bo_loc">
  <form class="col-md-24">
    <div class="form-row">
      <?php $bo_loc = (isset($bo_loc) && $bo_loc) ? $bo_loc : 'bo_loc' ?>
      <?php foreach ($truong_loc as $truong) :
        $truong['bo_loc'] = $bo_loc;
        $c->view('truong_loc/' . $truong['loai_truong_loc'], $truong);
      endforeach; ?>
    </div>
  </form>
</div>