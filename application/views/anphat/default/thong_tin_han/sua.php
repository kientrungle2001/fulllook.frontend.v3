<div class="modal" id="thong_tin_han_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa thông tin hạn</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form">
    <?php $ban_ghi_cap_nhat = ( isset($ban_ghi_cap_nhat) && $ban_ghi_cap_nhat ) ? $ban_ghi_cap_nhat : 'ban_ghi_cap_nhat'?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Tên thông tin hạn', 'model' => $ban_ghi_cap_nhat . '.ten_thong_tin_han'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Mã thông tin hạn', 'model' => $ban_ghi_cap_nhat . '.ma_thong_tin_han'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 12, 'tieu_de' => 'Cập nhật thông tin hạn', 'model' => 'sua_ban_ghi(' . $ban_ghi_cap_nhat . '); dong_dialog_sua_ban_ghi(\'thong_tin_han_modal\')'])?>
  </div>
</form>
</div>
</div>
</div>
</div>