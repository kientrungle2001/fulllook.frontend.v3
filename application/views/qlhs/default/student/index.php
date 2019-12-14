<?php $c->js('controller/utils/pagination.js')?>
<?php $c->js('controller/student/get_list.js')?>
<?php $c->js('controller/student/get_advices.js')?>
<?php $c->js('controller/student.js')?>

<?php $c->js('controller/classes.js')?>
<div ng-controller="classes_list_controller">
<div class="container-fluid content-wrapper" ng-controller="student_controller">
<?php $c->view('student/add/form')?>
<?php $c->view('student/edit/form')?>
 <div class="row">
  <div class="col-md-10">
    <h5>Danh sách học sinh</h5>
    <?php $c->view('student/detail/filter');?>
    <?php $c->view('student/detail/list');?>
    
  </div>
  <div class="col-md-14">
    <h5>Chi tiết</h5>
    <?php $c->view('student/detail/view')?>
  </div>
 </div> 
</div>
</div>