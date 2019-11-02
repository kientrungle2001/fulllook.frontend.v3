<div class="modal" id="<?= $module?>_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa <?= $tieu_de?></h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form">
    <?php $ban_ghi_cap_nhat = ( isset($ban_ghi_cap_nhat) && $ban_ghi_cap_nhat ) ? $ban_ghi_cap_nhat : 'ban_ghi_cap_nhat'?>
    <?php foreach($truong_them_sua as $truong):
      $truong['ban_ghi_cap_nhat'] = $ban_ghi_cap_nhat;
      $c->view('truong/' . $truong['loai_truong_them_sua'], $truong);
      endforeach;?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 12, 'tieu_de' => 'Cập nhật', 'model' => 'sua_ban_ghi(' . $ban_ghi_cap_nhat . '); dong_dialog_sua_ban_ghi(\''.$module.'_modal\')'])?>
  </div>
</form>
</div>
</div>
</div>
</div>