<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên công ty', 'model' => 'ban_ghi_moi.ten_cong_ty'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã công ty', 'model' => 'ban_ghi_moi.ma_cong_ty'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm công ty', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>