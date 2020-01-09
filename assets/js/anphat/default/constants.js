AP_API_URL = ANPHAT_API_URL = 'http://55945ce1.ngrok.io/api';
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
        url: ANPHAT_API_URL + '/v1/phong_ban'
      },
      chuc_vu: {
        url: ANPHAT_API_URL + '/v1/chuc_vu'
      },
      nha_cung_cap: {
        url: ANPHAT_API_URL + '/v1/nha_cung_cap'
      },
      loai_dich_vu: {
        url: ANPHAT_API_URL + '/v1/loai_dich_vu'
      },
      dich_vu: {
        url: ANPHAT_API_URL + '/v1/dich_vu'
      },
      index_du_lieu: {
        url: ANPHAT_API_URL + '/v1/index_du_lieu'
      },
    }
  }
};

AP_API = APC.api.v1;