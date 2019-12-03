AP_API_URL = ANPHAT_API_URL = 'http://laramongo.vn/api';
AP_API_VERSION = ANPHAT_API_VERSION = 'v1';
AJC = AJAX_CONSTANTS =  {
  type: {
    post: 'POST',
    get: 'GET',
    put: 'PUT',
    del: 'DELETE'
  }
};
APC = ANPHAT_CONSTANTS = {
  api: {
    v1: {
      tong_quat: {
        url: ANPHAT_API_URL + '/v1/tong_quat'
      },
      dia_diem: {
        url: ANPHAT_API_URL + '/v1/dia_diem'
      },
      nhan_vien: {
        url: ANPHAT_API_URL + '/v1/nhan_vien'
      },
      phong_ban: {
        url: '/v1/phong_ban'
      },
      chuc_vu: {
        url: '/v1/chuc_vu'
      },
      nha_cung_cap: {
        url: '/v1/nha_cung_cap'
      },
      loai_dich_vu: {
        url: '/v1/loai_dich_vu'
      },
      dich_vu: {
        url: '/v1/dich_vu'
      },
    }
  }
};

AP_API = APC.api.v1;