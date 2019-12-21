<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">Họ và tên</div>
      <div class="col-md-16">{{selected_row.name}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">SĐT</div>
      <div class="col-md-16">{{selected_row.phone}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Ngày sinh</div>
      <div class="col-md-16">{{selected_row.birthDate | vndate}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Ngày nhập học</div>
      <div class="col-md-16">{{selected_row.startStudyDate | vndate}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Ngày dừng học</div>
      <div class="col-md-16">{{selected_row.endStudyDate | vndate}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Ghi chú</div>
      <div class="col-md-16">{{selected_row.note}}</div>
    </div>
  </div>
  <div class="col-md-12">
  <div class="row">
      <div class="col-md-8">Phụ huynh</div>
      <div class="col-md-16">{{selected_row.parentName}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Trường học</div>
      <div class="col-md-16">{{selected_row.school}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Địa chỉ nhà</div>
      <div class="col-md-16">{{selected_row.address}}</div>
    </div>
    <div class="row">
      <div class="col-md-8">Lớp học</div>
      <div class="col-md-16">{{selected_row.currentClassNames}}</div>
    </div>
  </div>
</div>
