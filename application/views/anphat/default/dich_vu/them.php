<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên dịch vụ', 'model' => 'ban_ghi_moi.ten_dich_vu'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã dịch vụ', 'model' => 'ban_ghi_moi.ma_dich_vu'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm dịch vụ', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>