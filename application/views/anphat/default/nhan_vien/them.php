<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên Nhân viên', 'model' => 'ban_ghi_moi.ten_nhan_vien'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Mã Nhân viên', 'model' => 'ban_ghi_moi.ma_nhan_vien'])?>
    <?php $c->view('truong/so_xuong', ['kich_co' => 12, 'tieu_de' => 'Phòng ban', 'model' => 'ban_ghi_moi.id_phong_ban', 'repeat' => 'phong_ban in danh_sach_phong_ban', 'option_value' => 'phong_ban._id.$oid', 'option_label' => 'phong_ban.ten_phong_ban'])?>
    <?php $c->view('truong/so_xuong', ['kich_co' => 12, 'tieu_de' => 'Chức vụ', 'model' => 'ban_ghi_moi.id_chuc_vu', 'repeat' => 'chuc_vu in danh_sach_chuc_vu', 'option_value' => 'chuc_vu._id.$oid', 'option_label' => 'chuc_vu.ten_chuc_vu'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Tên đăng nhập', 'model' => 'ban_ghi_moi.ten_dang_nhap']) ?>
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Mật khẩu', 'model' => 'ban_ghi_moi.mat_khau']) ?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm Nhân viên', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
    
  </div>
</form>