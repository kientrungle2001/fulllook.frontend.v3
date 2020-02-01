<div class="modal fade" id="modal_danh_sach_thuoc_tinh">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Danh sách thuộc tính của "{{bo_thuoc_tinh_dang_chon.ten_bo_thuoc_tinh}}"</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <?php $c->view('luoc_do/bo_thuoc_tinh/danh_sach_thuoc_tinh/them_thuoc_tinh', $data)?>
        <form>
          <div class="form-row">
            <button class="btn btn-primary" ng-click="hien_thi_modal_them_thuoc_tinh()">Thêm thuộc tính</button>
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