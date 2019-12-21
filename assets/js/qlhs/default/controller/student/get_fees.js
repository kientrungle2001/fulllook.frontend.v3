qlhsApp.factory("student_get_fees", function() {
	return function($scope) {
		proxy_get({
			url: QC.api.v1.general_order.url + "/items/general_order",
			type: AJC.get,
			dataType: "json",
			data: {
				sort: "id desc",
				pageNum: 0,
				pageSize: 1000,
				where: {
					studentId: $scope.selected_row.id
				}
			},
			success: function(resp) {
				$scope.student_fees = resp.rows;
				$scope.$apply();
			}
		});
	};
});
