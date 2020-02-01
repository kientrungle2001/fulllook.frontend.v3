<div class="container-fluid" ng-controller="luoc_do_bo_thuoc_tinh_controller">
  <?php $c->view('luoc_do/bo_thuoc_tinh/them_bo_thuoc_tinh', $data)?>
  <?php $c->view('luoc_do/bo_thuoc_tinh/sua_bo_thuoc_tinh', $data)?>
  <h1>Bộ Thuộc tính của "{{luoc_do.ten_luoc_do}}" <small><a href="/luoc_do">Quay lại</a></small></h1>
  <div class="row">
    <div class="col-16">
      <button onclick="$('#modal_them_bo_thuoc_tinh').modal('show')" class="btn btn-primary">Thêm bộ thuộc tính</button>
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
          <td><a href="#" onclick="return false;" class="fa fa-circle" ng-class="{'text-success': bo_thuoc_tinh.trang_thai, 'text-dark': !bo_thuoc_tinh.trang_thai}" ng-click="thay_doi_trang_thai_bo_thuoc_tinh(bo_thuoc_tinh, 'trang_thai')"></a></td>
          <td>
            <a href="#" onclick="return false;" class="fa fa-pencil text-primary" ng-click="mo_dialog_sua_bo_thuoc_tinh(bo_thuoc_tinh)"></a>
            <a href="#" onclick="return false;" class="fa fa-trash text-danger" ng-click="xoa_bo_thuoc_tinh(bo_thuoc_tinh)"></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <?php $c->view('luoc_do/bo_thuoc_tinh/bo_thuoc_tinh_danh_sach', $data)?>
  
</div>



<script>
  anphatApp.controller('luoc_do_bo_thuoc_tinh_controller', [
    '$scope',
    'tai_danh_sach',
    'xoa_ban_ghi',
    'them_ban_ghi',
    'sua_ban_ghi',
    function($scope,
      tai_danh_sach,
      xoa_ban_ghi,
      them_ban_ghi,
      sua_ban_ghi) {
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
        $scope.bo_thuoc_tinh_dang_chon = bo_thuoc_tinh;
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
            $scope.tai_danh_sach_thuoc_tinh($scope.bo_thuoc_tinh_dang_chon);
          });
        }

      };

      $scope.bo_thuoc_tinh_moi = {
        id_luoc_do: '<?= $luoc_do['_id']['$oid']?>',
        trang_thai: true
      };

      $scope.them_bo_thuoc_tinh = function(bo_thuoc_tinh) {
        them_ban_ghi({
          ten_bang: 'bo_thuoc_tinh', 
          du_lieu: bo_thuoc_tinh
        }, function() {
          $scope.tai_danh_sach_bo_thuoc_tinh();
          $('#modal_them_bo_thuoc_tinh').modal('hide');
        });
      };

      $scope.xoa_bo_thuoc_tinh = function(bo_thuoc_tinh) {
        if(confirm('Bạn có muốn xóa "'+bo_thuoc_tinh.ten_bo_thuoc_tinh+'"')) {
          xoa_ban_ghi(bo_thuoc_tinh._id.$oid, {ten_bang: 'bo_thuoc_tinh'}, function() {
            $scope.tai_danh_sach_bo_thuoc_tinh();
          });
        }
      };

      $scope.cap_nhat_bo_thuoc_tinh = function(bo_thuoc_tinh) {
        var ban_ghi_params = angular.copy(bo_thuoc_tinh);
        var id = ban_ghi_params._id.$oid;
        delete ban_ghi_params._id;
        sua_ban_ghi(
          id,
          { ten_bang: 'bo_thuoc_tinh', du_lieu: ban_ghi_params },
          function(resp) {
            $('#modal_sua_bo_thuoc_tinh').modal('hide');
            $scope.tai_danh_sach_bo_thuoc_tinh();
          }
        );
      };

      $scope.mo_dialog_sua_bo_thuoc_tinh = function(bo_thuoc_tinh) {
        $scope.bo_thuoc_tinh_cap_nhat = angular.copy(bo_thuoc_tinh);
        $('#modal_sua_bo_thuoc_tinh').modal('show');
      };

      $scope.thay_doi_trang_thai_bo_thuoc_tinh = function(bo_thuoc_tinh, ten_truong) {
        var du_lieu = {};
        du_lieu[ten_truong] = !bo_thuoc_tinh[ten_truong];
        sua_ban_ghi(
          bo_thuoc_tinh._id.$oid,
          { ten_bang: 'bo_thuoc_tinh', du_lieu: du_lieu },
          function(resp) {
            $scope.tai_danh_sach_bo_thuoc_tinh();
          }
        );
      };

      $scope.hien_thi_modal_them_thuoc_tinh = function() {
        $('#modal_them_bo_thuoc_tinh_danh_sach').modal('show');
      };
    }
  ]);
</script>