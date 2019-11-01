<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên nhà cung cấp', 'model' => 'ban_ghi_moi.ten_nha_cung_cap'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã nhà cung cấp', 'model' => 'ban_ghi_moi.ma_nha_cung_cap'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm nhà cung cấp', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>