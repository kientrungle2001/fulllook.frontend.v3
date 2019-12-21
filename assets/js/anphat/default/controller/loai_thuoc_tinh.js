anphatApp.controller('loai_thuoc_tinh_controller', ['$scope', function ($scope) {
    $scope.ten_bang = 'loai_thuoc_tinh';
    $scope.tim_kiem_theo = ["ten_loai_thuoc_tinh", "ma_loai_thuoc_tinh"];
    $scope.thu_tu_sap_xep = [
        {
            "ten_truong": "_id",
            "tieu_de": "ID"
        },
        {
            "ten_truong": "pham_vi_loai_thuoc_tinh",
            "tieu_de": "Phạm vi"
        },
        {
            "ten_truong": "ten_loai_thuoc_tinh",
            "tieu_de": "Tên"
        },
        {
            "ten_truong": "ma_loai_thuoc_tinh",
            "tieu_de": "Mã"
        },
        {
            "ten_truong": "thu_tu",
            "tieu_de": "Thứ tự"
        }
    ];
    $scope.sap_xep = '_id';
    $scope.thu_tu = 'asc';
}]);