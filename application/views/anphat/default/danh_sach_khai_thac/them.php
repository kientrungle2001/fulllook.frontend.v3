<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên danh sách khai thác', 'model' => 'ban_ghi_moi.ten_danh_sach_khai_thac'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã danh sách khai thác', 'model' => 'ban_ghi_moi.ma_danh_sach_khai_thac'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm danh sách khai thác', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>