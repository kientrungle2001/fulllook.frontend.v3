<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bo_thuoc_tinh_danh_sach extends MY_Controller
{
    function index()
    {
        $data = [
            'module' => 'bo_thuoc_tinh_danh_sach',
            'modal_size' => 'normal',
            'tieu_de' => 'Bộ thuộc tính',
            'kich_co' => 12,
            'kich_co_nut_them' => 6,
            'kich_co_nut_loc' => 6,
            'truong_danh_sach' => [
                [
                    'loai_truong_tieu_de' => 'van_ban',
                    'loai_truong_danh_sach' => 'tham_chieu',
                    'model' => 'ban_ghi.id_bo_thuoc_tinh',
                    'tham_chieu' => 'id_bo_thuoc_tinh',
                    'gia_tri_tham_chieu' => 'ten_bo_thuoc_tinh',
                    'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_bo_thuoc_tinh',
                    'ten_bang' => 'bo_thuoc_tinh',
                    'tieu_de' => 'Bộ thuộc tính'
                ],
                [
                    'loai_truong_tieu_de' => 'van_ban',
                    'loai_truong_danh_sach' => 'tham_chieu',
                    'model' => 'ban_ghi.id_thuoc_tinh',
                    'tham_chieu' => 'id_thuoc_tinh',
                    'gia_tri_tham_chieu' => 'ten_thuoc_tinh',
                    'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_thuoc_tinh',
                    'ten_bang' => 'thuoc_tinh',
                    'tieu_de' => 'Thuộc tính'
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
                    'tieu_de' =>  'Bộ thuộc tính',
                    'model' => 'id_bo_thuoc_tinh',
                    'repeat' => 'bo_thuoc_tinh in danh_sach_them_sua_bo_thuoc_tinh',
                    'option_label' => 'bo_thuoc_tinh.ten_bo_thuoc_tinh',
                    'option_value' => 'bo_thuoc_tinh._id.$oid',
                    'tham_so' => [
                        'ten_bang' => 'bo_thuoc_tinh',
                        'dieu_kien' => [
                            'trang_thai' => true,
                        ]
                    ],
                    'ten_danh_sach' => 'danh_sach_them_sua_bo_thuoc_tinh',
                    'tham_so_thay_doi' => false
                ],
                [
                    'loai_truong_them_sua' => 'so_xuong',
                    'kich_co' => 24,
                    'tieu_de' =>  'Thuộc tính',
                    'model' => 'id_thuoc_tinh',
                    'repeat' => 'thuoc_tinh in danh_sach_them_sua_thuoc_tinh',
                    'option_label' => 'thuoc_tinh.ten_thuoc_tinh',
                    'option_value' => 'thuoc_tinh._id.$oid',
                    'tham_so' => [
                        'ten_bang' => 'thuoc_tinh',
                        'dieu_kien' => [
                            'trang_thai' => true,
                        ]
                    ],
                    'ten_danh_sach' => 'danh_sach_them_sua_thuoc_tinh',
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
                    'tieu_de' =>'Bộ thuộc tính',
                    'model' => 'bo_loc.id_bo_thuoc_tinh',
                    'repeat' => 'ban_ghi in danh_sach_tham_chieu_bo_thuoc_tinh',
                    'option_value' => 'ban_ghi._id.$oid',
                    'option_label' => 'ban_ghi.ten_bo_thuoc_tinh'
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
