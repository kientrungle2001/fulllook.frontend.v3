
<table class="table table-sm table-bordered">
  <tr>
    <th>ID</th>
    <?php foreach($truong_danh_sach as $truong):?>
    <th>
      <?php $c->view('truong_danh_sach/tieu_de/'.$truong['loai_truong_tieu_de'], $truong)?>
    </th>
    <?php endforeach;?>
  </tr>
  <tr ng-repeat="ban_ghi in danh_sach_ban_ghi">
    <td>{{$index + 1}}</td>
    <?php foreach($truong_danh_sach as $truong):?>
      <td>
      <?php $c->view('truong_danh_sach/danh_sach/'.$truong['loai_truong_danh_sach'], $truong)?>
      </td>
    <?php endforeach;?>
  </tr>
</table>