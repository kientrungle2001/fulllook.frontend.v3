<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cong_ty extends MY_Controller {
  function index() {
    $data = [
      'module' => 'cong_ty',
      'module_sub' => false,
	    'modal_size' => 'lg',
      'tieu_de' => 'Công ty',
      'kich_co' => 24,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'du_lieu_tai_tu_dong' => [
        [
          'ten_danh_sach' => 'danh_sach_tinh_thanh_pho',
          'goi_du_lieu' => [
            'ten_bang' => 'tinh_thanh_pho',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
        [
          'ten_danh_sach' => 'danh_sach_nhan_vien',
          'goi_du_lieu' => [
            'ten_bang' => 'nhan_vien',
            'sap_xep' => '_id',
            'thu_tu' => 'desc'
          ]
        ]
      ],
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_cong_ty',
          'tieu_de' => 'Tên công ty'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_so_thue',
          'tieu_de' => 'Mã số thuế'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.dia_chi',
          'tieu_de' => 'Địa chỉ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu_tinh',
          'model' => 'ban_ghi.id_tinh',
          'tieu_de' => 'Tỉnh/TP'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu_huyen',
          'id_field' => 'id',
          'model' => 'ban_ghi.id_huyen',
          'tham_chieu' => 'id_huyen',
          'gia_tri_tham_chieu' => 'ten_dia_diem',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_huyen',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Quận huyện'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ghi_chu',
          'tieu_de' => 'Ghi chú'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ngay_lien_he',
          'tieu_de' => 'Ngày liên hệ'
        ]
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên công ty',
          'model' => 'ten_cong_ty'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã công ty',
          'model' => 'ma_cong_ty'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã số thuế',
          'model' => 'ma_so_thue'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Tỉnh',
          'model' => 'id_tinh',
          'repeat' => 'tinh in danh_sach_tinh_thanh_pho',
          'change' => "chon_ban_ghi_them_sua(danh_sach_tinh_thanh_pho, 'id_tinh', 'tinh_dang_chon')",
          'option_label' => 'tinh.ten_dia_diem',
          'option_value' => 'tinh.id',
          'tham_so' => false,
          'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_tinh_thanh_pho',
          'ten_danh_sach_thay_doi' => false,
          'dieu_kien_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Huyện',
          'model' => 'id_huyen',
          'repeat' => 'huyen in danh_sach_them_sua_huyen',
          'option_label' => 'huyen.ten_dia_diem',
          'option_value' => 'huyen.id',
          'tham_so' => false,
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Ghi chú',
          'model' => 'ghi_chu'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Ngày liên hệ',
          'model' => 'ngay_lien_he'
        ]
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Tỉnh',
          'model' => 'bo_loc.id_tinh',
          'repeat' => 'ban_ghi in danh_sach_tinh_thanh_pho',
          'option_value' => 'ban_ghi.id',
          'option_label' => 'ban_ghi.ten_dia_diem',
          'change' => "chon_ban_ghi(danh_sach_tinh_thanh_pho, bo_loc.id_tinh, 'tinh_dang_chon')",
          'tham_so' => false,
          'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_tinh_thanh_pho',
          'ten_danh_sach_thay_doi' => false,
          'dieu_kien_thay_doi' => false,
          'option_model' => 'id_tinh_dang_chon'
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Huyện',
          'model' => 'bo_loc.id_huyen',
          'repeat' => 'ban_ghi in tinh_dang_chon.quan_huyen',
          'option_value' => 'ban_ghi.id',
          'option_label' => 'ban_ghi.ten_dia_diem',
          'tham_so' => false,
          'tham_so_thay_doi' => false,
          'change' => false,
          'option_model' => 'id_huyen_dang_chon'
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