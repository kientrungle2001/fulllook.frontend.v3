<?php $c->js('controller/teacher.js')?>
<?php $c->js('controller/classes.js')?>
<div ng-controller="classes_list_controller">
<div class="container-fluid content-wrapper" ng-controller="teacher_controller">
<?php $c->view('teacher/add/form')?>
<?php $c->view('teacher/edit/form')?>
 <div class="row">
  <div class="col-md-10">
    <h5>Danh sách giáo viên</h5>
    <?php $c->view('teacher/detail/filter');?>
    <?php $c->view('teacher/detail/list');?>
    
  </div>
  <div class="col-md-14">
    <h5>Chi tiết</h5>
    <?php $c->view('teacher/detail/view')?>
  </div>
 </div> 
</div>
</div>