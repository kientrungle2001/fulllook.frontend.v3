<?php $c = $controller; ?>
<div class="modal fade" id="modal_them_theo_bo_thuoc_tinh">
<div class="modal-dialog <?= isset($modal_size) && $modal_size ? 'modal-' . $modal_size: ''?>">
<div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Chọn bộ thuộc tính <?= $tieu_de?></h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form>
  <div class="form-row">
    <ul class="list-group w-100">
      <li class="list-group-item" ng-repeat="bo_thuoc_tinh in danh_sach_bo_thuoc_tinh">
        <a href="/cong_ty/them_moi/{{bo_thuoc_tinh._id.$oid}}"><h2>{{bo_thuoc_tinh.ten_bo_thuoc_tinh}}</h2></a>
      </li>
    </ul>
    
  </div>
</form>
</div>
</div>
</div>
</div>