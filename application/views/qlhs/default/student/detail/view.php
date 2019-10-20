<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-thong-tin-chi-tiet" role="tab" aria-controls="nav-thong-tin-chi-tiet" aria-selected="true">TT chi tiết</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-xep-lop" role="tab" aria-controls="nav-xep-lop" aria-selected="false">Xếp lớp</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-diem-danh" role="tab" aria-controls="nav-diem-danh" aria-selected="false">Điểm danh</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-ls-tu-van" role="tab" aria-controls="nav-ls-tu-van" aria-selected="false">LS tư vấn</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-ls-hoc-tap" role="tab" aria-controls="nav-ls-hoc-tap" aria-selected="false">LS học tập</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-hoc-phi" role="tab" aria-controls="nav-hoc-phi" aria-selected="false">Học phí</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-thoi-khoa-bieu" role="tab" aria-controls="nav-thoi-khoa-bieu" aria-selected="false">Thời khóa biểu</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-sp-da-su-dung" role="tab" aria-controls="nav-sp-da-su-dung" aria-selected="false">SP đã sử dụng</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-thong-tin-chi-tiet" role="tabpanel" aria-labelledby="nav-thong-tin-chi-tiet-tab"><?php $controller->view('student/detail/view/info')?></div>
  <div class="tab-pane fade" id="nav-xep-lop" role="tabpanel" aria-labelledby="nav-xep-lop-tab"><?php $controller->view('student/detail/view/class_schedule')?></div>
  <div class="tab-pane fade" id="nav-diem-danh" role="tabpanel" aria-labelledby="nav-diem-danh-tab"><?php $controller->view('student/detail/view/muster')?></div>
  <div class="tab-pane fade" id="nav-ls-tu-van" role="tabpanel" aria-labelledby="nav-ls-tu-van-tab"><?php $controller->view('student/detail/view/advice')?></div>
  <div class="tab-pane fade" id="nav-ls-hoc-tap" role="tabpanel" aria-labelledby="nav-ls-hoc-tap-tab"><?php $controller->view('student/detail/view/history')?></div>
  <div class="tab-pane fade" id="nav-hoc-phi" role="tabpanel" aria-labelledby="nav-hoc-phi-tab"><?php $controller->view('student/detail/view/fee')?></div>
  <div class="tab-pane fade" id="nav-thoi-khoa-bieu" role="tabpanel" aria-labelledby="nav-thoi-khoa-bieu-tab"><?php $controller->view('student/detail/view/class_timesheet')?></div>
  <div class="tab-pane fade" id="nav-sp-da-su-dung" role="tabpanel" aria-labelledby="nav-sp-da-su-dung-tab"><?php $controller->view('student/detail/view/using')?></div>

</div>