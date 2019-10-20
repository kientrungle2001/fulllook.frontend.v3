<div class="container-fluid">
 <div class="row">
  <div class="col-md-5 d-none">
    <?php $controller->view('student/detail/add')?>
  </div>
  <div class="col-md-10">
    <h5>Danh sách học sinh</h5>
    <?php $controller->view('student/detail/filter');?>
    <?php $controller->view('student/detail/list');?>
    
  </div>
  <div class="col-md-14">
    <h5>Chi tiết</h5>
    <?php $controller->view('student/detail/view')?>
  </div>
 </div> 
</div>