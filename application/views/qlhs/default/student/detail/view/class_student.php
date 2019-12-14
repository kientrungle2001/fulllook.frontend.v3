<h1 class="text-center">Xếp lớp</h1>
<nav>
  <div class="nav nav-tabs" id="nav-xep-lop-tab" role="tablist">
    <?php $c->tag('tab', ['id' => 'xep-lop-form', 'cls' => 'active', 'title' => 'Xếp lớp', 'func' => 'class_student']); ?>
    <?php $c->tag('tab', ['id' => 'xep-lop-danh-sach', 'cls' => '', 'title' => 'Danh sách xếp lớp', 'func' => 'class_student_list']); ?>
  </div>
</nav>
<div class="tab-content" id="nav-xep-lop-tabContent">
  <div class="tab-pane fade show active" id="nav-xep-lop-form" role="tabpanel" aria-labelledby="nav-xep-lop-form-tab"><?php $controller->view('student/detail/view/class_student/form')?></div>
  <div class="tab-pane fade" id="nav-xep-lop-danh-sach" role="tabpanel" aria-labelledby="nav-xep-lop-danh-sach-tab"><?php $controller->view('student/detail/view/class_student/list')?></div>

</div>