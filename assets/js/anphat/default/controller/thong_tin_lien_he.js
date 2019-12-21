anphatApp.controller('thong_tin_lien_he_controller', ['$scope', function($scope) {
  $scope.ten_bang = 'thong_tin_lien_he';
  $scope.tim_kiem_theo = ["ten_lien_he", "ma_so_thue"];
  $scope.thu_tu_sap_xep = [
    {
      "ten_truong": "_id",
      "tieu_de": "ID"
    },
    {
      "ten_truong": "ten_lien_he",
      "tieu_de": "Tên liên hệ"
    },
    {
      "ten_truong": "ma_so_thue",
      "tieu_de": "Mã số thuế"
    }
  ];
  $scope.sap_xep = '_id';
  $scope.thu_tu = 'desc';
}]);