QU = QLHS_API_URL = '/api';
QV = QLHS_API_VERSION = 'v1';
AJC = AJAX_CONSTANTS =  {
  type: {
    post: 'POST',
    get: 'GET',
    put: 'PUT',
    del: 'DELETE'
  }
};
QC = QLHS_CONSTANTS = {
  api: {
    v1: {
      student: {
        url: QU + '/student'
      },
      classes: {
        url: QU + '/classes'
      },
      class_student: {
        url: QU + '/class_student'
      },
      advice: {
        url: QU + '/advice'
      },
      general_order: {
        url: QU + '/general_order'
      },
      student_schedule: {
        url: QU + '/student_schedule'
      },
      student_order: {
        url: QU + '/student_order'
      },
      teacher: {
        url: QU + '/teacher'
      },
      payment_period: {
        url: QU + '/payment_period'
      },
    }
  }
};

QA = QC.api[QV];