<div id="modal_add_teacher" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm giáo viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $c->view('teacher/detail/add', [
          'model' => 'arow',
          'submit_model' => 'insert(arow)'
        ])?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="insert(arow)">Thêm mới</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>