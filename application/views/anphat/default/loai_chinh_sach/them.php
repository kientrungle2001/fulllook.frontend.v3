<?php $c = $controller; ?>
<form>
  <div class="form-row">
    <?php $c->view('truong/van_ban', ['kich_co' => 12, 'tieu_de' => 'Tên loại chính sách', 'model' => 'ban_ghi_moi.ten_loai_chinh_sach'])?>
    <?php $c->view('truong/van_ban', ['kich_co' => 6, 'tieu_de' => 'Mã loại chính sách', 'model' => 'ban_ghi_moi.ma_loai_chinh_sach'])?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm loại chính sách', 'model' => 'them_ban_ghi(ban_ghi_moi)'])?>
  </div>
</form>