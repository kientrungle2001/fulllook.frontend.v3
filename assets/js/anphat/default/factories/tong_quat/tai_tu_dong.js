anphatApp.factory("tong_quat_tai_tu_dong", function() {
	return function($scope, tai_danh_sach) {
    if($scope.du_lieu_tai_tu_dong) {
      $scope.du_lieu_tai_tu_dong.forEach(function(du_lieu){
        tai_danh_sach(du_lieu.goi_du_lieu, function(ket_qua) {
          $scope[du_lieu.ten_danh_sach] = ket_qua.du_lieu;
          $scope.$apply();
        });
      });
    }
  }
});