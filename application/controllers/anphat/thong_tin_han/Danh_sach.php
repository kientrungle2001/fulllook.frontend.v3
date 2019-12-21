<?php
class Danh_sach extends MY_Action
{
  public function execute($luoc_do = 'thong_tin_han')
  {
    $luoc_do = $this->controller->laramongo->get('luoc_do', [
      'ma_luoc_do' => $luoc_do
    ]);
    
    $data = [
      'id_luoc_do' => $luoc_do['_id']['$oid'],
      'module' => $luoc_do['ma_luoc_do'],
      'module_sub' => false,
      'modal_size' => $luoc_do['modal_size'],
      'tieu_de' => $luoc_do['ten_luoc_do'],
      'kich_co' => $luoc_do['kich_co'],
      'kich_co_nut_them' => $luoc_do['kich_co_nut_them'],
      'kich_co_nut_loc' => $luoc_do['kich_co_nut_loc'],
      'model_nut_them' => 'mo_dialog_them_theo_bo_thuoc_tinh()',
      'model_nut_nhap_du_lieu' => 'chuyen_trang(\'/thong_tin_han/nhap_du_lieu\')()',
      'model_nut_xuat_du_lieu' => 'chuyen_trang(\'/thong_tin_han/xuat_du_lieu\')()',
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
        ],
        [
          'ten_danh_sach' => 'danh_sach_nha_cung_cap',
          'goi_du_lieu' => [
            'ten_bang' => 'nha_cung_cap',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
      ],
      'truong_danh_sach' => [],
      'truong_loc' => [],
      'truong_them_sua' => []
    ];
    foreach ($luoc_do['danh_sach_thuoc_tinh'] as $thuoc_tinh) {
      if ($thuoc_tinh['trang_thai']) {
        if (isset($thuoc_tinh['cau_hinh_danh_sach'])) {
          $data['truong_danh_sach'][] = $thuoc_tinh['cau_hinh_danh_sach'];
        }

        if (isset($thuoc_tinh['cau_hinh_them_sua'])) {
          $data['truong_them_sua'][] = $thuoc_tinh['cau_hinh_them_sua'];
        }

        if (isset($thuoc_tinh['cau_hinh_loc'])) {
          $data['truong_loc'][] = $thuoc_tinh['cau_hinh_loc'];
        }
      }
    }

    $data['truong_loc'][] = [
      'loai_truong_loc' => 'nut_bam',
      'kich_co' => 3,
      'tieu_de' => 'Thực hiện',
      'model' => "loc_du_lieu(bo_loc);"
    ];

    $this->controller->render('tong_quat/tong_quan', $data);
  }
}