<nav aria-label="Page navigation">
  <ul class="pagination">
  <li class="page-item">Kích cỡ trang: <select class="btn btn-primary btn-sm" ng-model="phan_trang.kich_co_trang" ng-change="tai_danh_sach()">
    <option ng-value="10">10</option>
    <option ng-value="20">20</option>
    <option ng-value="50">50</option>
    <option ng-value="100">100</option>
    <option ng-value="100">200</option>
  </select></li>
  <li class="page-item"><a class="page-link" href="#" onclick="return false" ng-click="den_trang_dau()">Trang đầu</a></li>
    <li class="page-item"><a class="page-link" href="#" onclick="return false" ng-click="den_trang_truoc()">Trang trước</a></li>
    <li class="page-item"><a class="page-link" href="#" onclick="return false">{{phan_trang.trang_hien_thoi + 1}}</a></li>
    <li class="page-item"><a class="page-link" href="#" onclick="return false" ng-click="den_trang_tiep()">Trang tiếp</a></li>
    <li class="page-item"><a class="page-link" href="#" onclick="return false" ng-click="den_trang_cuoi()">Trang cuối</a></li>
    <li class="page-item p-1">Tổng số bản ghi {{tong_so_ban_ghi}}, tổng số trang {{tong_so_trang}}</li>
  </ul>
</nav>