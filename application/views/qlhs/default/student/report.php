<h1>Báo cáo</h1>
<div class="container-fluid">
  <nav>
    <div class="nav nav-tabs" id="nav-report-tab" role="tablist">
      <?php $c->tag('tab', ['id' => 'total-report', 
      'cls' => 'active', 
      'title' => 'Tổng thể']); ?>
      <?php $c->tag('tab', ['id' => 'grade-report', 
        'cls' => '', 
        'title' => 'Khối'
        ]); ?>
      <?php $c->tag('tab', ['id' => 'class-report', 
        'cls' => '', 
        'title' => 'Lớp'
        ]); ?>
    </div>
  </nav>
  <div class="tab-content" id="nav-report-tabContent">
    <div class="tab-pane fade show active" 
      id="nav-total-report" role="tabpanel" 
      aria-labelledby="nav-total-report-tab">
      <?php $controller->view('student/report/total_report') ?>
    </div>
    <div class="tab-pane fade" id="nav-grade-report" 
      role="tabpanel" aria-labelledby="nav-grade-report-tab">
      <?php $controller->view('student/report/grade_report') ?>
    </div>
    <div class="tab-pane fade" id="nav-class-report" 
      role="tabpanel" aria-labelledby="nav-class-report-tab">
      <?php $controller->view('student/report/class_report') ?>
    </div>
  </div>
</div>