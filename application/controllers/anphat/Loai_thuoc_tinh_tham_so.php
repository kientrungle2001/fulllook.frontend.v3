<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loai_thuoc_tinh_tham_so extends MY_Controller
{
  function index()
  {
    $data = [
      'module' => 'loai_thuoc_tinh_tham_so',
      'modal_size' => 'normal',
      'tieu_de' => 'Tham số của loại thuộc tính',
      'kich_co' => 24,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh',
          'tham_chieu' => 'id_loai_thuoc_tinh',
          'gia_tri_tham_chieu' => 'ten_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh',
          'ten_bang' => 'loai_thuoc_tinh',
          'tieu_de' => 'Tên loại thuộc tính'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh',
          'tham_chieu' => 'id_loai_thuoc_tinh',
          'gia_tri_tham_chieu' => 'pham_vi_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh',
          'ten_bang' => false,
          'tieu_de' => 'Phạm vi loại thuộc tính'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_thuoc_tinh',
          'tham_chieu' => 'id_loai_thuoc_tinh',
          'gia_tri_tham_chieu' => 'ma_loai_thuoc_tinh',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_loai_thuoc_tinh',
          'ten_bang' => false,
          'tieu_de' => 'Mã loại thuộc tính'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_loai_thuoc_tinh_tham_so',
          'tieu_de' => 'Tên Tham số'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_loai_thuoc_tinh_tham_so',
          'tieu_de' => 'Mã Tham số'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.tham_so_loai_truong_them_sua',
          'tieu_de' => 'Loại trường thêm sửa'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.tham_so_kieu_du_lieu',
          'tieu_de' => 'Kiểu dữ liệu'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.thu_tu',
          'tieu_de' => 'Thứ tự'
        ],
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 24,
          'tieu_de' =>  'Loại thuộc tính',
          'model' => 'id_loai_thuoc_tinh',
          'repeat' => 'loai_thuoc_tinh in danh_sach_them_sua_loai_thuoc_tinh',
          'option_label' => 'loai_thuoc_tinh.ten_loai_thuoc_tinh + \' \' + loai_thuoc_tinh.pham_vi_loai_thuoc_tinh',
          'option_value' => 'loai_thuoc_tinh._id.$oid',
          'tham_so' => [
            'ten_bang' => 'loai_thuoc_tinh',
            'dieu_kien' => [
              'trang_thai' => true,
            ]
          ],
          'ten_danh_sach' => 'danh_sach_them_sua_loai_thuoc_tinh',
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Tên Tham số',
          'model' => 'ten_loai_thuoc_tinh_tham_so',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Mã Tham số',
          'model' => 'ma_loai_thuoc_tinh_tham_so',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Loại trường thêm sửa',
          'model' => 'tham_so_loai_truong_them_sua',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Kiểu dữ liệu',
          'model' => 'tham_so_kieu_du_lieu',
          'kieu_du_lieu' => 'text'
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
          'tieu_de' => 'Loai thuoc tinh',
          'model' => 'bo_loc.id_loai_thuoc_tinh',
          'repeat' => 'loai_thuoc_tinh in danh_sach_tham_chieu_loai_thuoc_tinh',
          'option_value' => 'loai_thuoc_tinh._id.$oid',
          'option_label' => 'loai_thuoc_tinh.ten_loai_thuoc_tinh + \' \' + loai_thuoc_tinh.pham_vi_loai_thuoc_tinh'
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
}
