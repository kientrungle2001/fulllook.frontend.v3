<div class="container-fluid">
  <h1>Điểm danh học sinh</h1>
  <div class="row">
    <div class="col-md-6">
      <h2 class="lead">Thêm điểm danh</h2>
      <form>
        <div class="form-group">
          <label for="studyDate">Ngày điểm danh</label>
          <select class="form-control form-control-sm">
            <option>Chọn ngày</option>
          </select>
        </div>
        <div class="form-group">
          <label for="classId">Lớp</label>
          <select placeholder="Lớp" class="form-control form-control-sm">
            <option ng-value="null">Chọn lớp</option>
          </select>
        </div>
        <div class="form-group">
          <label for="studentIds">Học sinh</label>
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
              </tr>
              <tr>
                <td><input type="checkbox"></td>
                <td>1232</td>
                <td>Phạm Thị Phương Thu</td>
                <td>0987554433</td>
              </tr>
            </table>          
          </div>
          
        </div>
        <div class="form-group">
        <label>Trạng thái</label>
        <select class="form-control form-control-sm">
          <option ng-value="null">Chọn trạng thái</option>
          <option value="NTT">Nghỉ trừ tiền</option>
        </select>
        </div>
        <div class="form-group text-right">
        <button class="btn btn-primary">Thêm điểm danh</button>
        </div>
      </form>

    </div>
    <div class="col-md-18">
      <div class="row">
        <div class="col-md-12">
        <input type="text" placeholder="Chọn ngày">
        <select>
          <option ng-value="null">Chọn lớp</option>
        </select>
        </div>
        <div class="col-md-12 text-right">Sắp xếp: <select>
          <option ng-value="null">Lớp - Ngày điểm danh tăng</option>
        </select>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Tên học sinh</th>
            <th>Ngày điểm danh</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Phạm Thị Phương Thu</td>
            <td>22/12/2019</td>
            <td>Nghỉ trừ tiền</td>
            <td><a href="#" class="fa fa-edit"></a> <a href="#" class="fa fa-remove text-danger"></a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>