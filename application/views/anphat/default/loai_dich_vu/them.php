<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên loại dịch vụ', 'model' => 'ban_ghi_moi.ten_loai_dich_vu'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã loại dịch vụ', 'model' => 'ban_ghi_moi.ma_loai_dich_vu'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm loại dịch vụ', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>