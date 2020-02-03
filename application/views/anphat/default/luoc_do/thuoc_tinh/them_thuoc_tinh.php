<?php $c = $controller;
$truong_them_sua = [
  [
    'loai_truong_them_sua' => 'van_ban',
    'kich_co' => 4,
    'tieu_de' =>  'Tên Thuộc tính',
    'model' => 'ten_thuoc_tinh',
    'kieu_du_lieu' => 'text'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kich_co' => 4,
    'tieu_de' =>  'Mã Thuộc tính',
    'model' => 'ma_thuoc_tinh',
    'kieu_du_lieu' => 'text'
  ],
  [
    'loai_truong_them_sua' => 'so_xuong',
    'kich_co' => 4,
    'tieu_de' =>  'Loại thuộc tính danh sách',
    'model' => 'id_loai_thuoc_tinh_danh_sach',
    'repeat' => 'loai_thuoc_tinh in danh_sach_them_sua_loai_thuoc_tinh_danh_sach',
    'option_label' => 'loai_thuoc_tinh.ten_loai_thuoc_tinh',
    'option_value' => 'loai_thuoc_tinh._id.$oid',
    'tham_so' => [
      'ten_bang' => 'loai_thuoc_tinh',
      'dieu_kien' => [
        'trang_thai' => true,
        'pham_vi_loai_thuoc_tinh' => 'truong_danh_sach'
      ]
    ],
    'ten_danh_sach' => 'danh_sach_them_sua_loai_thuoc_tinh_danh_sach',
    'tham_so_thay_doi' => false
  ],
  [
    'loai_truong_them_sua' => 'so_xuong',
    'kich_co' => 4,
    'tieu_de' =>  'Loại thuộc tính thêm sửa',
    'model' => 'id_loai_thuoc_tinh_them_sua',
    'repeat' => 'loai_thuoc_tinh in danh_sach_them_sua_loai_thuoc_tinh_them_sua',
    'option_label' => 'loai_thuoc_tinh.ten_loai_thuoc_tinh',
    'option_value' => 'loai_thuoc_tinh._id.$oid',
    'tham_so' => [
      'ten_bang' => 'loai_thuoc_tinh',
      'dieu_kien' => [
        'trang_thai' => true,
        'pham_vi_loai_thuoc_tinh' => 'truong_them_sua'
      ]
    ],
    'ten_danh_sach' => 'danh_sach_them_sua_loai_thuoc_tinh_them_sua',
    'tham_so_thay_doi' => false
  ],
  [
    'loai_truong_them_sua' => 'so_xuong',
    'kich_co' => 4,
    'tieu_de' =>  'Loại thuộc tính lọc',
    'model' => 'id_loai_thuoc_tinh_loc',
    'repeat' => 'loai_thuoc_tinh in danh_sach_them_sua_loai_thuoc_tinh_loc',
    'option_label' => 'loai_thuoc_tinh.ten_loai_thuoc_tinh',
    'option_value' => 'loai_thuoc_tinh._id.$oid',
    'tham_so' => [
      'ten_bang' => 'loai_thuoc_tinh',
      'dieu_kien' => [
        'trang_thai' => true,
        'pham_vi_loai_thuoc_tinh' => 'truong_loc'
      ]
    ],
    'ten_danh_sach' => 'danh_sach_them_sua_loai_thuoc_tinh_loc',
    'tham_so_thay_doi' => false
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kieu_du_lieu' => 'number',
    'kich_co' => 4,
    'tieu_de' =>  'Thứ tự',
    'model' => 'thu_tu'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kieu_du_lieu' => 'checkbox',
    'kich_co' => 4,
    'tieu_de' =>  'Danh sách',
    'model' => 'cho_phep_danh_sach'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kieu_du_lieu' => 'checkbox',
    'kich_co' => 4,
    'tieu_de' =>  'Thêm sửa',
    'model' => 'cho_phep_them_sua'
  ],
  [
    'loai_truong_them_sua' => 'van_ban',
    'kieu_du_lieu' => 'checkbox',
    'kich_co' => 4,
    'tieu_de' =>  'Lọc',
    'model' => 'cho_phep_loc'
  ],
];
?>
<span class="d-none" ng-init="truong_them_sua=<?= htmlentities(json_encode($truong_them_sua)) ?>;"></span>
<div class="modal fade" id="modal_them_thuoc_tinh">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm thuộc tính cho lược đồ <?= $luoc_do['ten_luoc_do'] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-row">
              <?php foreach ($truong_them_sua as $truong) :
                $truong['ban_ghi_cap_nhat'] = 'thuoc_tinh_moi';
                $c->view('truong/' . $truong['loai_truong_them_sua'], $truong);
              endforeach; ?>
              <?php $c->view('truong/nut_bam', ['kich_co' => 6, 'tieu_de' => 'Thêm mới', 'model' => 'them_thuoc_tinh(thuoc_tinh_moi);']) ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>