<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên chính sách dịch vụ', 'model' => 'ban_ghi_moi.ten_chinh_sach_dich_vu'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã chính sách dịch vụ', 'model' => 'ban_ghi_moi.ma_chinh_sach_dich_vu'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm chính sách dịch vụ', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>