anphatApp.controller('cong_ty_controller', ['$scope', function($scope) {
  $scope.ten_bang = 'cong_ty';
  $scope.tim_kiem_theo = ["ten_cong_ty", "ma_so_thue"];
  $scope.thu_tu_sap_xep = [
    {
      "ten_truong": "_id",
      "tieu_de": "ID"
    },
    {
      "ten_truong": "ten_cong_ty",
      "tieu_de": "Tên công ty"
    },
    {
      "ten_truong": "ma_so_thue",
      "tieu_de": "Mã số thuế"
    }
  ];
  $scope.sap_xep = '_id';
  $scope.thu_tu = 'desc';
}]);

anphatApp.controller('cong_ty_sub_controller', ['$scope', function($scope) {
  
}]);