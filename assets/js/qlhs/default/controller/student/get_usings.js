qlhsApp.factory("student_get_usings", function() {
	return function($scope) {
    proxy_get({
      url: QC.api.v1.student_order.url + '/items/student_order',
      type: AJC.get, dataType: 'json',
      data: {
        sort: 'id desc',
        pageNum: 0,
        pageSize: 1000,
        where: {
          studentId: $scope.selected_row.id
        }
      },
      success: function(resp) {
        $scope.danh_sach_da_su_dung = resp.rows;
        $scope.$apply();
      }
    });
  };
});