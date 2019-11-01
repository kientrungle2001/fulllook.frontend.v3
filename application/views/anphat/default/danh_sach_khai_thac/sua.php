<div class="modal" id="danh_sach_khai_thac_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa danh sách khai thác</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form">
    <?php $ban_ghi_cap_nhat = ( isset($ban_ghi_cap_nhat) && $ban_ghi_cap_nhat ) ? $ban_ghi_cap_nhat : 'ban_ghi_cap_nhat'?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Tên danh sách khai thác', 'model' => $ban_ghi_cap_nhat . '.ten_danh_sach_khai_thac'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Mã danh sách khai thác', 'model' => $ban_ghi_cap_nhat . '.ma_danh_sach_khai_thac'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 12, 'tieu_de' => 'Cập nhật danh sách khai thác', 'model' => 'sua_ban_ghi(' . $ban_ghi_cap_nhat . '); dong_dialog_sua_ban_ghi(\'danh_sach_khai_thac_modal\')'])?>
  </div>
</form>
</div>
</div>
</div>
</div>