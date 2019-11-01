<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên phòng ban', 'model' => 'ban_ghi_moi.ten_phong_ban'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã phòng ban', 'model' => 'ban_ghi_moi.ma_phong_ban'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm phòng ban', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>