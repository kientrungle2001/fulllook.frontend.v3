<?php $c->view('tong_quat/phan_trang');?>
<table class="table table-sm table-bordered">
  <tr>
  <th><input type="checkbox" ng-model="trang_thai_chon_tat_ca" ng-change="chon_tat_ca()" /></th>
    <th>ID</th>
    <?php foreach($truong_danh_sach as $truong):?>
    <th>
      <?php $c->view('truong_danh_sach/tieu_de/'.$truong['loai_truong_tieu_de'], $truong)?>
    </th>
    <?php endforeach;?>
    <th><span class="fa fa-circle"></span></th>
    <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
  </tr>
  <tr ng-repeat="ban_ghi in danh_sach_ban_ghi">
  <td><input type="checkbox" ng-model="cac_ban_ghi_dang_chon[ban_ghi._id.$oid]" /></td>
    <td>{{$index + 1}}</td>
    <?php foreach($truong_danh_sach as $truong):?>
      <td>
      <?php $c->view('truong_danh_sach/danh_sach/'.$truong['loai_truong_danh_sach'], $truong)?>
      </td>
    <?php endforeach;?>
    <td><a href="#" class="fa fa-circle" 
      ng-class="{'text-success': ban_ghi.trang_thai, 'text-dark': !ban_ghi.trang_thai}" 
      ng-click="thay_doi_trang_thai(ban_ghi)"></a></td>
    <td>
      <a href="#" class="fa fa-pencil text-primary" ng-click="mo_dialog_sua_ban_ghi(ban_ghi, '<?= $module?>_modal')"></a>
      <a href="#" class="fa fa-trash text-danger" ng-click="xoa_ban_ghi(ban_ghi)"></a>
    </td>
  </tr>
</table>

<?php $c->view('tong_quat/phan_trang');?>