<div class="container-fluid" ng-controller="cong_ty_nhap_du_lieu_controller">
  <h1>Nhập dữ liệu</h1>
  <hr>
  <form action="#" onsubmit="return false;">
    Chọn File: <input type="file"> Chọn bộ thuộc tính: <select>
      <option value="Công Ty">BTT Công Ty</option>
    </select>
    <button class="btn btn-primary">Kiểm tra</button>
  </form>
  <form action="#" onsubmit="return false;">
    <h2>Khớp các trường</h2>
    <table class="table w-25">
      <tr>
        <td>Tên công ty</td>
        <td><select class="form-control form-control-sm">
            <option value="Tên công ty">Tên công ty</option>
          </select></td>
      </tr>
      <tr>
        <td>Mã số thuế</td>
        <td><select class="form-control form-control-sm">
            <option value="Mã số thuế">Mã số thuế</option>
          </select></td>
      </tr>
    </table>
    <button class="btn btn-primary">Nhập dữ liệu</button>
  </form>

  <form>
    <h2>Kết quả</h2>
    <table class="table w-25">
      <tr>
        <td>Số bản ghi</td>
        <td>100</td>
      </tr>
      <tr>
        <td>Nhập</td>
        <td>20</td>
      </tr>
      <tr>
        <td>Cập nhật</td>
        <td>30</td>
      </tr>
      <tr>
        <td>Lỗi</td>
        <td>50 (<a href="#">Xem danh sách</a>)</td>
      </tr>
    </table>
    <a href="/cong_ty/danh_sach">Danh sách công ty</a>
  </form>

</div>

<script>
anphatApp.controller('cong_ty_nhap_du_lieu_controller', [
  '$scope', 'tai_danh_sach', 
  function($scope, tai_danh_sach) {
    $scope.tai_danh_sach_bo_thuoc_tinh = function() {
      tai_danh_sach({
        ten_bang: 'bo_thuoc_tinh',
        dieu_kien: {
          id_luoc_do: $scope.luoc_do._id.$oid
        }
      }, function(ket_qua){
        $scope.danh_sach_bo_thuoc_tinh = ket_qua.du_lieu;
      });
    };
    $scope.tai_danh_sach_bo_thuoc_tinh();
  }
]);
</script>