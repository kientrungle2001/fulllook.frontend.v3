<?php $c->js('controller/utils/pagination.js')?>
<?php $c->js('controller/student/get_list.js')?>
<?php $c->js('controller/general_factories/get_lists.js')?>
<?php $c->js('controller/student/get_advices.js')?>
<?php $c->js('controller/student/get_class_students.js')?>
<?php $c->js('controller/student/get_fees.js')?>
<?php $c->js('controller/student/get_schedules.js')?>
<?php $c->js('controller/student/get_usings.js')?>
<?php $c->js('controller/student/crud.js')?>
<?php $c->js('controller/student/crud_class_students.js')?>
<?php $c->js('controller/student/crud_advices.js')?>
<?php $c->js('controller/student/crud_fees.js')?>
<?php $c->js('controller/student.js')?>

<?php $c->js('controller/classes.js')?>
<div>
<div class="container-fluid content-wrapper" ng-controller="student_controller">
<?php $c->view('student/add/form')?>
<?php $c->view('student/edit/form')?>
 <div class="row">
  <div class="col-md-10">
    <h5>Danh sách học sinh</h5>
    <?php $c->view('student/detail/filter');?>
    <?php $c->view('student/detail/list');?>
  </div>
  <div class="col-md-14" ng-show="selected_row">
    <h5>Chi tiết - {{selected_row.name}}</h5>
    <?php $c->view('student/detail/view')?>
  </div>
 </div> 
</div>
</div>