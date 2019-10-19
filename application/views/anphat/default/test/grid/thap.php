<div class="container-fluid">
<div class="table-responsive">
<div class="row">
<div class="col-md-4">
  <form class="form">
    <fieldset class="form-group">
    <h3>Lọc</h3>
    <div class="form-group"><input type="text" class="form-control" placeholder="Search"></div>
    <div class="form-group"><select class="form-control" placeholder="Search"><option value="">Nhân viên kinh doanh</option></select></div>
    <div class="form-group"><select class="form-control" placeholder="Search"><option value="">Nhà cung cấp</option></select></div>
    </fieldset>
  </form>
</div>
<div class="col-md-10">
<div class="form-group-np text-right mb-2">
  <a href="#">Tất cả</a> | <a href="#">Đã đọc</a> | <a href="#">Chưa đọc</a> <select style="border: none; background: transparent;"><option>Sắp xếp</option></select> <span class="fa fa-angle-up"></span>
</div>
<table class="table table-sm table-bordered">
  <tr>
    <th><input type="checkbox"></th>
    <th>ID</th>
    <th>Hợp đồng</th>
    <th>Từ</th>
    <th>Ngày</th>
    <th><span class="fa fa-clock-o text-dark"></span></th>
    <th><span class="fa fa-file-text-o text-dark"></span></th>
    <th><span class="fa fa-usb text-dark"></span></th>
    <th><span class="fa fa-paperclip text-dark"></span></th>
    <th><span class="fa fa-circle text-dark"></span></th>
    </tr>
    <?php for($i = 0; $i < 50; $i++):?>
    <tr>
      <td><input type="checkbox"></td>
      <td><?= $i + 1?></td>
      <td><a href="#" onclick="return false;">Dịch vụ NEW-1CA(1N), CÔNG TY CỔ PHẦN THƯƠNG MẠI QUỐC TẾ VIỆT, MST <em>0101819959</em></a></td>
      <td class="text-nowrap">Đặng Ngọc Mai<br /><span class="text-secondary">NVKD</span></td>
      <td>04/05/2018</td>
      <td><span class="fa fa-clock-o text-primary"></span></td>
      <td><span class="fa fa-file-text-o text-primary"></span></td>
      <td><span class="fa fa-usb text-primary"></span></td>
      <td><span class="fa fa-paperclip text-primary"></span></td>
      <td><span class="fa fa-circle text-primary"></span></td>
    </tr>
    <?php endfor;?>
</table>
</div>
<div class="col-md-10">
  <div class="text-right">Detail<br /></div>
  <div class="row">
    <div class="col-md-12">
    Tên công ty: CÔNG TY CỔ PHẦN THƯƠNG MẠI QUỐC TẾ VIỆT<br />
    MST: 0101819959
    </div>
    <div class="col-md-12">
    Chủ thể: Chị Hường <br />
    SĐT: 0123.123.123<br />
    Email: trungtamdaynghehan@gmail.com
    </div>
  </div>
</div>
</div>

<table class="table table-sm table-bordered">
  <tr>
    <th><input type="checkbox" /></th>
    <th>Công ty</th>
    
    <th>Chủ thể</th>

    <th>Dịch vụ</th>
    <th>Kinh doanh</th>
    <th>Kỹ thuật</th>
    <th>Giao vận</th>
    <th>Nhà CC</th>
    <th>Thay đổi</th>
  </tr>
  <?php for($i = 0; $i < 10; $i++):?>
  <tr>
    <td><input type="checkbox" /></td>
    <td><a class="text-primary font-weight-bold" href="#" onclick="return false;">CÔNG TY CỔ PHẦN THƯƠNG MẠI QUỐC TẾ VIỆT</a><br />
    <em>0101819959</em><br />
    <span class="fa fa-check-square-o"></span><em> Đã xong</em>
    </td>
    <td>Chị Hường<br /><em>0974296122</em><br />
    <em>trungtamdaynghehan@gmail.com</em>
    </td>
    <td>
    NEW-1CA(<em>1N</em>)<br />
    <em style="text-decoration: line-through;">1.236.000 ₫</em><br /><em> - 200.000 ₫</em><br />
    <em>1.036.000 ₫</em>
    </td>
    <td>
      Đặng Thị Mai<br />(<em>maidt</em>)<br />
      TT:<em>12/10/2018</em><br />
      BG:<em>05/11/2018</em><br />
      HS:<em>30/11/2018</em><br />
    </td>
    <td>
      Nguyễn Văn An<br />(<em>annv</em>)<br />
      Đã giao khách hàng cần hỗ trợ 012918272
    </td>
    <td>
      KTT<br />
      Nguyễn Văn Bình
    </td>
    <td>TT:<em>20/11/2018</em><br />TTTB:<em>20/11/2018</em></td>
    <td>C:<em>10/10/2018</em><br />U:<em>30/11/2018</em></td>
  </tr>
<?php endfor;?>
</table>
</div>
</div>