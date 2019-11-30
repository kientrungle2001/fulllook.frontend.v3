anphatApp.controller('luoc_do_controller', ['$scope', function ($scope) {
    $scope.ten_bang = 'luoc_do';
    $scope.tim_kiem_theo = ["ten_luoc_do", "ma_luoc_do"];
    $scope.thu_tu_sap_xep = [
        {
            "ten_truong": "_id",
            "tieu_de": "ID"
        },
        {
            "ten_truong": "ten_luoc_do",
            "tieu_de": "Tên"
        },
        {
            "ten_truong": "ma_luoc_do",
            "tieu_de": "Mã lược đồ"
        },
        {
            "ten_truong": "thu_tu",
            "tieu_de": "Thứ tự"
        }
    ];
    $scope.sap_xep = '_id';
    $scope.thu_tu = 'asc';
}]);