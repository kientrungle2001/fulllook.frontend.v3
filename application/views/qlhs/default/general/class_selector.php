<?php 
$class_selector_model_alias = str_replace('.', '_', $class_selector_model);
?>
<div class="btn-group btn-sm">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Chọn lớp
  </button>
  <div class="dropdown-menu">
    <div class="p-3">
    <div class="row" style="width: 600px;">
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Khối" ng-model="<?= $class_selector_model_alias?>_selected_level">
          <option ng-value="">Khối</option>
          <option ng-repeat="level in get_class_levels(classes)" ng-value="level">Khối {{level}}</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Môn" ng-model="<?= $class_selector_model_alias?>_selected_subject_id">
          <option ng-value="">Môn</option>
          <option ng-repeat="subject in subjects" ng-value="subject.id">{{subject.name}}</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Giáo viên" ng-model="<?= $class_selector_model_alias?>_selected_teacher_id">
          <option ng-value="">Giáo viên</option>
          <option ng-repeat="teacher in teachers" ng-value="teacher.id">{{teacher.name}}</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Trạng thái" ng-model="<?= $class_selector_model_alias?>_selected_status">
          <option ng-value="">Trạng thái</option>
          <option ng-value="false">Chưa kích hoạt</option>
          <option ng-value="true">Đã kích hoạt</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <select class="form-control form-control-sm" placeholder="Trực tuyến" ng-model="<?= $class_selector_model_alias?>_selected_online">
          <option ng-value="">Trực tuyến?</option>
          <option ng-value="0">Trung tâm</option>
          <option ng-value="1">Trực tuyến</option>
        </select>
      </div>
      <div class="form-group col-24">
      <label>Chọn Lớp</label>
        <select class="form-control form-control-sm" placeholder="Lớp" 
        ng-model="<?= $class_selector_model?>" ng-change="<?= $class_selector_change?>">
          <option ng-value="">Lớp</option>
          <option ng-repeat="cl in classes | filter:{'level':<?= $class_selector_model_alias?>_selected_level, 
          'subjectId': <?= $class_selector_model_alias?>_selected_subject_id,
          'teacherId': <?= $class_selector_model_alias?>_selected_teacher_id, 
          'status': <?= $class_selector_model_alias?>_selected_status, 
          'online': <?= $class_selector_model_alias?>_selected_online}" ng-value="cl.id">{{cl.name}}</option>
        </select>
      </div>
    </div>
    </div>
  </div>
</div>