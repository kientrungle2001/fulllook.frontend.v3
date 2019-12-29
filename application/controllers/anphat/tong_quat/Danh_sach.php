<?php
class Danh_sach extends MY_Action
{
  public function execute($luoc_do = 'tong_quat')
  {
    $luoc_do = $this->controller->laramongo->get('luoc_do', [
      'ma_luoc_do' => $luoc_do
    ]);
    
    $data = [
      'id_luoc_do' => $luoc_do['_id']['$oid'],
      'module' => $luoc_do['ma_luoc_do'],
      'module_sub' => false,
      'modal_size' => isset($luoc_do['modal_size']) ? $luoc_do['modal_size'] : 24,
      'tieu_de' => $luoc_do['ten_luoc_do'],
      'kich_co' => isset($luoc_do['kich_co']) ? $luoc_do['kich_co'] : 4,
      'kich_co_nut_them' => isset($luoc_do['kich_co_nut_them']) ? $luoc_do['kich_co_nut_them'] : 4,
      'kich_co_nut_loc' => isset($luoc_do['kich_co_nut_loc']) ? $luoc_do['kich_co_nut_loc'] : 4,
      'model_nut_them' => 'mo_dialog_them_theo_bo_thuoc_tinh()',
      'model_nut_nhap_du_lieu' => 'chuyen_trang(\'/tong_quat/nhap_du_lieu/'.$luoc_do['ma_luoc_do'].'\')()',
      'model_nut_xuat_du_lieu' => 'chuyen_trang(\'/tong_quat/xuat_du_lieu/'.$luoc_do['ma_luoc_do'].'\')()',
      'du_lieu_tai_tu_dong' => [],
      'truong_danh_sach' => [],
      'truong_loc' => [],
      'truong_them_sua' => []
    ];
    $du_lieu_tai_tu_dong = isset($luoc_do['du_lieu_tai_tu_dong']) ? $luoc_do['du_lieu_tai_tu_dong']: '';
    $du_lieu_tai_tu_dong = explode(';', $du_lieu_tai_tu_dong);
    foreach($du_lieu_tai_tu_dong as $tai_tu_dong) {
      $tai_tu_dong = trim($tai_tu_dong);
      if($tai_tu_dong) {
        $tai_tu_dong = explode(':', $tai_tu_dong);
        $ten_danh_sach = trim($tai_tu_dong[0]);
        $goi_du_lieu = [];
        $danh_sach_tham_so = explode(',',trim($tai_tu_dong[1]));
        foreach($danh_sach_tham_so as $tham_so) {
          $tham_so = explode('=', $tham_so);
          $ten_tham_so = trim($tham_so[0]);
          $gia_tri_tham_so = trim($tham_so[1]);
          $goi_du_lieu[$ten_tham_so] = $gia_tri_tham_so;
        }
        $data['du_lieu_tai_tu_dong'][] = [
          'ten_danh_sach' => $ten_danh_sach,
          'goi_du_lieu' => $goi_du_lieu
        ];
      }
    }
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