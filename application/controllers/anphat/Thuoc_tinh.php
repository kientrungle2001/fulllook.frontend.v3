<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thuoc_tinh extends MY_Controller
{
  function index()
  {
    $data = [
      'module' => 'thuoc_tinh',
      'modal_size' => 'normal',
      'tieu_de' => 'Thuộc tính',
      'kich_co' => 24,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_luoc_do',
          'tham_chieu' => 'id_luoc_do',
          'gia_tri_tham_chieu' => 'ten_luoc_do',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_luoc_do',
          'ten_bang' => 'luoc_do',
          'tieu_de' => 'Lược đồ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_thuoc_tinh',
          'tieu_de' => 'Tên Thuộc tính'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_thuoc_tinh',
          'tieu_de' => 'Mã Thuộc tính'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh_danh_sach',
          'tham_chieu' => 'id_loai_thuoc_tinh_danh_sach',
          'gia_tri_tham_chieu' => 'ten_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh_danh_sach',
          'ten_bang' => 'loai_thuoc_tinh',
          'tieu_de' => 'Loại thuộc tính danh sách'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh_them_sua',
          'tham_chieu' => 'id_loai_thuoc_tinh_them_sua',
          'gia_tri_tham_chieu' => 'ten_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh_them_sua',
          'ten_bang' => 'loai_thuoc_tinh',
          'tieu_de' => 'Loại thuộc tính thêm sửa'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh_loc',
          'tham_chieu' => 'id_loai_thuoc_tinh_loc',
          'gia_tri_tham_chieu' => 'ten_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh_loc',
          'ten_bang' => 'loai_thuoc_tinh',
          'tieu_de' => 'Loại thuộc tính lọc'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.thu_tu',
          'tieu_de' => 'Thứ tự'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'lien_ket',
          'model' => 'thuoc_tinh/cau_hinh_them_sua',
          'tieu_de' => 'Edit Config'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'lien_ket',
          'model' => 'thuoc_tinh/cau_hinh_danh_sach',
          'tieu_de' => 'Grid Config'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'lien_ket',
          'model' => 'thuoc_tinh/cau_hinh_loc',
          'tieu_de' => 'Filter Config'
        ],
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 24,
          'tieu_de' =>  'Lược đồ',
          'model' => 'id_luoc_do',
          'repeat' => 'luoc_do in danh_sach_them_sua_luoc_do',
          'option_label' => 'luoc_do.ten_luoc_do',
          'option_value' => 'luoc_do._id.$oid',
          'tham_so' => [
            'ten_bang' => 'luoc_do',
            'dieu_kien' => [
              'trang_thai' => true,
            ]
          ],
          'ten_danh_sach' => 'danh_sach_them_sua_luoc_do',
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Tên Thuộc tính',
          'model' => 'ten_thuoc_tinh',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Mã Thuộc tính',
          'model' => 'ma_thuoc_tinh',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 24,
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
          'kich_co' => 24,
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
          'kich_co' => 24,
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
          'kich_co' => 24,
          'tieu_de' =>  'Thứ tự',
          'model' => 'thu_tu'
        ],
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' => 'Luoc do',
          'model' => 'bo_loc.id_luoc_do',
          'repeat' => 'luoc_do in danh_sach_tham_chieu_luoc_do',
          'option_value' => 'luoc_do._id.$oid',
          'option_label' => 'luoc_do.ten_luoc_do'
        ],
        [
          'loai_truong_loc' => 'nut_bam',
          'kich_co' => 6,
          'tieu_de' => 'Thực hiện',
          'model' => "loc_du_lieu(bo_loc);"
        ],
      ]
    ];
    $this->render('tong_quat/tong_quan', $data);
  }

  public function cau_hinh_danh_sach($id) {
    $thuoc_tinh = $this->laramongo->get('thuoc_tinh', $id);
    $this->render('thuoc_tinh/cau_hinh_danh_sach', $thuoc_tinh);
  }

  public function cau_hinh_loc($id) {
    $thuoc_tinh = $this->laramongo->get('thuoc_tinh', $id);
    $this->render('thuoc_tinh/cau_hinh_loc', $thuoc_tinh);
  }

  public function cau_hinh_them_sua($id) {
    $thuoc_tinh = $this->laramongo->get('thuoc_tinh', $id);
    $this->render('thuoc_tinh/cau_hinh_them_sua', $thuoc_tinh);
  }
}
