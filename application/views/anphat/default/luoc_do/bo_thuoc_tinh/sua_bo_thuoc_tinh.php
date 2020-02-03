<?php $c = $controller; 
$truong_them_sua = [
  [
    'loai_truong_them_sua' => 'van_ban',
    'kich_co' => 24,
    'tieu_de' =>  'Tên Bộ thuộc tính',
    'model' => 'ten_bo_thuoc_tinh',
    'kieu_du_lieu' => 'text'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kich_co' => 24,
    'tieu_de' =>  'Mã Bộ thuộc tính',
    'model' => 'ma_bo_thuoc_tinh',
    'kieu_du_lieu' => 'text'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kieu_du_lieu' => 'number',
    'kich_co' => 24,
    'tieu_de' =>  'Thứ tự',
    'model' => 'thu_tu'
  ],
];
?>
<div class="modal fade" id="modal_sua_bo_thuoc_tinh">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Sửa Bộ thuộc tính cho lược đồ <?= $luoc_do['ten_luoc_do']?></h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form-row">
  <div class="form-row">
    <?php foreach($truong_them_sua as $truong):
      $truong['ban_ghi_cap_nhat'] = 'bo_thuoc_tinh_cap_nhat';
      $c->view('truong/' . $truong['loai_truong_them_sua'], $truong);
      endforeach;?>
    <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Cập nhật', 'model' => 'cap_nhat_bo_thuoc_tinh(bo_thuoc_tinh_cap_nhat);'])?>
  </div>
  </div>
</form>
</div>
</div>
</div>
</div>