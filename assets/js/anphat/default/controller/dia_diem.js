anphatApp.controller('dia_diem_controller', ['$scope', function($scope) {
  $scope.tai_danh_sach_tinh = function() {
    proxy_ajax({
      url: ANPHAT_API_URL + ANPHAT_CONSTANTS.api.v1.dia_diem.danh_sach,
      type: AJAX_CONSTANTS.type.post,
      data: {
        dieu_kien: {
          loai_dia_diem: 'tinh',
          trang_thai: 1
        },
        sap_xep: 'thu_tu',
        thu_tu: 'asc',
        kich_co_trang: 100,
        trang_hien_thoi: 0
      },
      success: function(danh_sach_tinh) {
        $scope.danh_sach_tinh = danh_sach_tinh;
      }
    });
  };

  // lay du lieu
  $scope.tai_danh_sach_tinh();
}]);