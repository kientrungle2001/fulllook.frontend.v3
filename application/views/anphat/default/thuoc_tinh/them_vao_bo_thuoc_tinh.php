<div class="container-fluid">
  <h1>Thuoc tinh: <?= $ten_thuoc_tinh?> - <?= $_id['$oid']?></h1>
  <select ng-model="id_bo_thuoc_tinh" class="btn btn-primary">
    <option>Chon bo thuoc tinh</option>
    <option ng-repeat="bo_thuoc_tinh in danh_sach_bo_thuoc_tinh" ng-value="bo_thuoc_tinh._id.$oid">{{bo_thuoc_tinh.ten_bo_thuoc_tinh}}</option>
  </select>
  <button ng-click="them_vao_bo_thuoc_tinh()">Them vao bo thuoc tinh</button>
</div>