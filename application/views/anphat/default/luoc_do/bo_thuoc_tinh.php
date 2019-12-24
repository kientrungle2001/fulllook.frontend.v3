<div class="container-fluid" ng-controller="luoc_do_bo_thuoc_tinh_controller">
  <h1>Bộ Thuộc tính của "{{luoc_do.ten_luoc_do}}" <small><a href="/luoc_do">Quay lại</a></small></h1>
  <div class="row">
    <div class="col-8">
      <table class="table table-hover">
        <tr>
          <th>Tên bộ thuộc tính</th>
          <th>Mã Bộ thuộc tính</th>
          <th>Danh sách thuộc tính</th>
          <th>Thứ tự</th>
          <th><a href="#" class="text-success fa fa-circle"></a></th>
          <th><a href="#" class="fa fa-pencil text-primary"></a>
            <a href="#" class="fa fa-trash text-danger"></a></th>
        </tr>
        <tr ng-repeat="bo_thuoc_tinh in danh_sach_bo_thuoc_tinh">
          <td>{{bo_thuoc_tinh.ten_bo_thuoc_tinh}}</td>
          <td>{{bo_thuoc_tinh.ma_bo_thuoc_tinh}}</td>
          <td><a href="#" onclick="return false" ng-click="hien_thi_danh_sach_thuoc_tinh(bo_thuoc_tinh)">Danh sách thuộc tính</a></td>
          <td>{{bo_thuoc_tinh.thu_tu}}</td>
          <td><a href="#" class="fa fa-circle" ng-class="{'text-success': bo_thuoc_tinh.trang_thai, 'text-dark': !bo_thuoc_tinh.trang_thai}" ng-click="thay_doi_trang_thai(bo_thuoc_tinh, 'trang_thai')"></a></td>
          <td>
            <a href="#" class="fa fa-pencil text-primary" ng-click="mo_dialog_sua_ban_ghi(bo_thuoc_tinh)"></a>
            <a href="#" class="fa fa-trash text-danger" ng-click="xoa_ban_ghi(bo_thuoc_tinh)"></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <div class="modal fade" id="modal_danh_sach_thuoc_tinh">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Danh sách thuộc tính</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên thuộc tính</th>
                  <th>Mã thuộc tính</th>
                  <th>Thứ tự</th>
                  <th><span class="fa fa-list text-success"></span></th>
                  <th><span class="fa fa-edit text-success"></span></th>
                  <th><span class="fa fa-filter text-success"></span></th>
                  <th><span class="text-success fa fa-circle"></span></th>
                  <th><span class="text-danger fa fa-remove"></span></th>
                </tr>
                <tr ng-repeat="thuoc_tinh in danh_sach_thuoc_tinh">
                  <td>{{$index + 1}}</td>
                  <td>{{thuoc_tinh.thuoc_tinh.ten_thuoc_tinh}}</td>
                  <td>{{thuoc_tinh.thuoc_tinh.ma_thuoc_tinh}}</td>
                  <td>{{thuoc_tinh.thu_tu}}</td>
                  <td><a href="#" onclick="return false;" class="fa fa-list" ng-class="{'text-success': thuoc_tinh.cho_phep_danh_sach}"></a></td>
                  <td><a href="#" onclick="return false;" class="fa fa-edit" ng-class="{'text-success': thuoc_tinh.cho_phep_them_sua}"></a></td>
                  <td><a href="#" onclick="return false;" class="fa fa-filter" ng-class="{'text-success': thuoc_tinh.cho_phep_loc}"></a></td>
                  <td><a class="text-success fa fa-circle"></a></td>
                  <td><a class="text-danger fa fa-remove" href="#" onclick="return false" ng-click="xoa_thuoc_tinh(thuoc_tinh)"></a></td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  anphatApp.controller('luoc_do_bo_thuoc_tinh_controller', [
    '$scope',
    'tai_danh_sach',
    'xoa_ban_ghi',
    function($scope,
      tai_danh_sach,
      xoa_ban_ghi) {
      $scope.luoc_do = <?= json_encode($luoc_do) ?>;

      $scope.hien_thi_tham_chieu = function(id, tham_chieu, gia_tri_tham_chieu, danh_sach_tham_chieu) {
        if (!danh_sach_tham_chieu) return '';
        for (var i = 0; i < danh_sach_tham_chieu.length; i++) {
          if (danh_sach_tham_chieu[i]._id.$oid === id ||
            (danh_sach_tham_chieu[i].id && (danh_sach_tham_chieu[i].id === id))) {
            return danh_sach_tham_chieu[i][gia_tri_tham_chieu];
          }
        }
      };

      $scope.tai_danh_sach_bo_thuoc_tinh = function() {
        tai_danh_sach({
          ten_bang: 'bo_thuoc_tinh',
          dieu_kien: {
            id_luoc_do: $scope.luoc_do._id.$oid
          },
          thu_tu: 'asc',
          sap_xep: 'thu_tu'
        }, function(ket_qua) {
          $scope.danh_sach_bo_thuoc_tinh = ket_qua.du_lieu;
          $scope.$apply();
        });
      };

      $scope.tai_danh_sach_bo_thuoc_tinh();

      $scope.thay_doi_trang_thai = function(thuoc_tinh, model) {
        thuoc_tinh[model] = !thuoc_tinh[model];
      };

      $scope.hien_thi_danh_sach_thuoc_tinh = function(bo_thuoc_tinh) {
        jQuery('#modal_danh_sach_thuoc_tinh').modal('show');
        $scope.tai_danh_sach_thuoc_tinh(bo_thuoc_tinh);
      };

      $scope.tai_danh_sach_thuoc_tinh = function(bo_thuoc_tinh) {
        tai_danh_sach({
          ten_bang: 'bo_thuoc_tinh_danh_sach',
          dieu_kien: {
            id_bo_thuoc_tinh: bo_thuoc_tinh._id.$oid
          },
          thu_tu: 'asc',
          sap_xep: 'thu_tu'
        }, function(ket_qua) {
          $scope.danh_sach_thuoc_tinh = ket_qua.du_lieu;
          $scope.$apply();
        });
      };

      $scope.xoa_thuoc_tinh = function(thuoc_tinh) {
        if (confirm('Ban co muon xoa thuoc tinh?')) {
          xoa_ban_ghi(thuoc_tinh._id.$oid, {
            ten_bang: 'bo_thuoc_tinh_danh_sach'
          }, function(ket_qua) {
            $scope.tai_danh_sach_thuoc_tinh();
          });
        }

      };
    }
  ]);
</script>