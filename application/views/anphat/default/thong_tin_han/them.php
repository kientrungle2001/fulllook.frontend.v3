<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên thông tin hạn', 'model' => 'ban_ghi_moi.ten_thong_tin_han'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã thông tin hạn', 'model' => 'ban_ghi_moi.ma_thong_tin_han'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm thông tin hạn', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>