QLHS_API_URL = '/api';
QLHS_API_VERSION = 'v1';
AJAX_CONSTANTS =  {
  type: {
    post: 'POST',
    get: 'GET',
    put: 'PUT',
    del: 'DELETE'
  }
};
QLHS_CONSTANTS = {
  api: {
    v1: {
      student: {
        url: QLHS_API_URL + '/student'
      },
      classes: {
        url: QLHS_API_URL + '/classes'
      },
      class_student: {
        url: QLHS_API_URL + '/class_student'
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