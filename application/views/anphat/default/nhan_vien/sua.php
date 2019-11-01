<div class="modal" id="nhan_vien_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa Nhân viên</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form">
    <?php $ban_ghi_cap_nhat = ( isset($ban_ghi_cap_nhat) && $ban_ghi_cap_nhat ) ? $ban_ghi_cap_nhat : 'ban_ghi_cap_nhat'?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Tên Nhân viên', 'model' => $ban_ghi_cap_nhat . '.ten_nhan_vien'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Mã Nhân viên', 'model' => $ban_ghi_cap_nhat . '.ma_nhan_vien'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Tên đăng nhập', 'model' => $ban_ghi_cap_nhat . '.ten_dang_nhap'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 24, 'tieu_de' => 'Mật khẩu', 'model' => $ban_ghi_cap_nhat . '.mat_khau'])?>
    <?php $c->view('truong/so_xuong', ['kich_co' => 12, 'tieu_de' => 'Phòng ban', 'model' => $ban_ghi_cap_nhat . '.id_phong_ban', 'repeat' => 'phong_ban in danh_sach_phong_ban', 'option_value' => 'phong_ban._id.$oid', 'option_label' => 'phong_ban.ten_phong_ban'])?>
    <?php $c->view('truong/so_xuong', ['kich_co' => 12, 'tieu_de' => 'Chức vụ', 'model' => $ban_ghi_cap_nhat. '.id_chuc_vu', 'repeat' => 'chuc_vu in danh_sach_chuc_vu', 'option_value' => 'chuc_vu._id.$oid', 'option_label' => 'chuc_vu.ten_chuc_vu'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 12, 'tieu_de' => 'Cập nhật Nhân viên', 'model' => 'sua_ban_ghi(' . $ban_ghi_cap_nhat . '); dong_dialog_sua_ban_ghi(\'nhan_vien_modal\')'])?>
  </div>
</form>
</div>
</div>
</div>
</div>