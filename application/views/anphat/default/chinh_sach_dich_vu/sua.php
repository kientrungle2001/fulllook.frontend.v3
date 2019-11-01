<div class="modal" id="chinh_sach_dich_vu_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa chính sách dịch vụ</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form">
    <?php $ban_ghi_cap_nhat = ( isset($ban_ghi_cap_nhat) && $ban_ghi_cap_nhat ) ? $ban_ghi_cap_nhat : 'ban_ghi_cap_nhat'?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Tên chính sách dịch vụ', 'model' => $ban_ghi_cap_nhat . '.ten_chinh_sach_dich_vu'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Mã chính sách dịch vụ', 'model' => $ban_ghi_cap_nhat . '.ma_chinh_sach_dich_vu'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 12, 'tieu_de' => 'Cập nhật chính sách dịch vụ', 'model' => 'sua_ban_ghi(' . $ban_ghi_cap_nhat . '); dong_dialog_sua_ban_ghi(\'chinh_sach_dich_vu_modal\')'])?>
  </div>
</form>
</div>
</div>
</div>
</div>