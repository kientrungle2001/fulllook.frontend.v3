<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <?php $c->tag('tab', ['id' => 'thong-tin-chi-tiet', 'cls' => 'active', 'title' => 'TT chi tiết']); ?>
    <?php $c->tag('tab', ['id' => 'xep-lop', 'cls' => '', 'title' => 'Xếp lớp']); ?>
    <?php if(0):?>
    <?php  $c->tag('tab', ['id' => 'diem-danh', 'cls' => '', 'title' => 'Điểm danh']); ?>
    <?php endif?>
    <?php $c->tag('tab', ['id' => 'ls-tu-van', 'cls' => '', 'title' => 'LS Tư vấn']); ?>
    <?php $c->tag('tab', ['id' => 'ls-hoc-tap', 'cls' => '', 'title' => 'LS học tập']); ?>
    <?php $c->tag('tab', ['id' => 'hoc-phi', 'cls' => '', 'title' => 'Học phí']); ?>
    <?php $c->tag('tab', ['id' => 'thoi-khoa-bieu', 'cls' => '', 'title' => 'Thời khóa biểu']); ?>
    <?php $c->tag('tab', ['id' => 'sp-da-su-dung', 'cls' => '', 'title' => 'SP đã sử dụng']); ?>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-thong-tin-chi-tiet" role="tabpanel" aria-labelledby="nav-thong-tin-chi-tiet-tab"><?php $controller->view('student/detail/view/info')?></div>
  <div class="tab-pane fade" id="nav-xep-lop" role="tabpanel" aria-labelledby="nav-xep-lop-tab"><?php $controller->view('student/detail/view/class_schedule')?></div>
  <?php if(0):?>
  <div class="tab-pane fade" id="nav-diem-danh" role="tabpanel" aria-labelledby="nav-diem-danh-tab"><?php $controller->view('student/detail/view/muster')?></div>
  <?php endif;?>
  <div class="tab-pane fade" id="nav-ls-tu-van" role="tabpanel" aria-labelledby="nav-ls-tu-van-tab"><?php $controller->view('student/detail/view/advice')?></div>
  <div class="tab-pane fade" id="nav-ls-hoc-tap" role="tabpanel" aria-labelledby="nav-ls-hoc-tap-tab"><?php $controller->view('student/detail/view/history')?></div>
  <div class="tab-pane fade" id="nav-hoc-phi" role="tabpanel" aria-labelledby="nav-hoc-phi-tab"><?php $controller->view('student/detail/view/fee')?></div>
  <div class="tab-pane fade" id="nav-thoi-khoa-bieu" role="tabpanel" aria-labelledby="nav-thoi-khoa-bieu-tab"><?php $controller->view('student/detail/view/class_timesheet')?></div>
  <div class="tab-pane fade" id="nav-sp-da-su-dung" role="tabpanel" aria-labelledby="nav-sp-da-su-dung-tab"><?php $controller->view('student/detail/view/using')?></div>

</div>