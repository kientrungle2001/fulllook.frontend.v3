<div class="container-fluid" ng-controller="cong_ty_nhap_du_lieu_controller">
  <h1>Nhập dữ liệu</h1>
  <hr>
  <form action="#" onsubmit="return false;">
    Chọn File: <input id="file_nhap_du_lieu" type="file"> <button ng-click="upload_nhap_du_lieu()" class="btn btn-primary">Tải file lên</button> <br>
    <div id="progress-wrp">
      <div class="progress-bar--upload" style="width: 0px; background: #ccc;">
        <div class="status">0%</div>
      </div>
    </div>
    File đang xử lý: <select ng-model="upload_du_lieu_dang_chon" class="btn btn-primary">
      <option ng-repeat="upload_nhap_du_lieu in danh_sach_upload_nhap_du_lieu" ng-value="upload_nhap_du_lieu">{{upload_nhap_du_lieu.ten_file}}</option>
    </select><br>
    Chọn bộ thuộc tính: <select ng-model="bo_thuoc_tinh_dang_chon" class="btn btn-success">
      <option ng-repeat="bo_thuoc_tinh in danh_sach_bo_thuoc_tinh" ng-value="bo_thuoc_tinh">{{bo_thuoc_tinh.ten_bo_thuoc_tinh}}</option>
    </select>
    <button class="btn btn-primary" onclick="return false;" ng-click="kiem_tra()">Kiểm tra</button>
  </form>
  <form action="#" onsubmit="return false;" ng-show="kiem_tra_nhap_du_lieu">
    <h2>Khớp các trường</h2>
    <table class="table w-50">
      <tr ng-repeat="thuoc_tinh in bo_thuoc_tinh_dang_chon.danh_sach_thuoc_tinh">
        <td>{{thuoc_tinh.thuoc_tinh.ten_thuoc_tinh}}</td>
        <td><select class="form-control form-control-sm" 
            ng-model="danh_sach_cot_nhap_du_lieu[thuoc_tinh.thuoc_tinh.ma_thuoc_tinh].thu_tu">
            <option>No Column</option>
            <option ng-value="$index" ng-repeat="ten_cot in dong_dau_tien">{{ten_cot}}</option>
          </select></td>
          <td><select class="form-control form-control-sm" 
            ng-model="danh_sach_cot_nhap_du_lieu[thuoc_tinh.thuoc_tinh.ma_thuoc_tinh].kieu_du_lieu">
            <option>No Type</option>
            <option value="van_ban">Van ban</option>
            <option value="ngay_thang">Ngay thang</option>
            <option value="so_nguyen">So nguyen</option>
            <option value="so_thuc">So thuc</option>
            <option value="boolean">Boolean</option>
          </select></td>
      </tr>
    </table>
    <button class="btn btn-primary" ng-click="nhap_du_lieu()">Nhập dữ liệu</button>
  </form>

  <form ng-show="ket_qua_nhap_du_lieu">
    <h2>Kết quả</h2>
    <table class="table w-25">
      <tr>
        <td>Số bản ghi</td>
        <td>100</td>
      </tr>
      <tr>
        <td>Nhập</td>
        <td>20</td>
      </tr>
      <tr>
        <td>Cập nhật</td>
        <td>30</td>
      </tr>
      <tr>
        <td>Lỗi</td>
        <td>50 (<a href="#">Xem danh sách</a>)</td>
      </tr>
    </table>
    <a href="/cong_ty/danh_sach">Danh sách công ty</a>
  </form>

</div>

<script>
  anphatApp.controller('cong_ty_nhap_du_lieu_controller', [
    '$scope', 'tai_danh_sach',
    function($scope, tai_danh_sach) {
      $scope.luoc_do = <?= json_encode($luoc_do) ?>;
      $scope.tai_danh_sach_bo_thuoc_tinh = function() {
        tai_danh_sach({
          ten_bang: 'bo_thuoc_tinh',
          dieu_kien: {
            id_luoc_do: $scope.luoc_do._id.$oid
          },
          sap_xep: 'thu_tu',
          thu_tu: 'asc'
        }, function(ket_qua) {
          $scope.danh_sach_bo_thuoc_tinh = ket_qua.du_lieu;
          $scope.$apply();
        });
      };
      $scope.tai_danh_sach_bo_thuoc_tinh();

      $scope.kiem_tra = function() {
        if (!$scope.bo_thuoc_tinh_dang_chon || !$scope.upload_du_lieu_dang_chon) {
          return false;
        }
        if($scope.upload_du_lieu_dang_chon.ten_file.indexOf('.xls') === -1 && $scope.upload_du_lieu_dang_chon.ten_file.indexOf('.csv') == -1) {
          return false;
        }
        $.ajax({
          url:  AP_API.tong_quat.url + '/kiem_tra_nhap_du_lieu',
          data: {
            id_bo_thuoc_tinh: $scope.bo_thuoc_tinh_dang_chon._id.$oid,
            id_upload_du_lieu: $scope.upload_du_lieu_dang_chon._id.$oid,
            duong_dan: $scope.upload_du_lieu_dang_chon.duong_dan,
            ma_bo_thuoc_tinh: $scope.bo_thuoc_tinh_dang_chon.ma_bo_thuoc_tinh
          },
          type: 'post',
          success: function(resp) {
            $scope.kiem_tra_nhap_du_lieu = true;
            $scope.dong_dau_tien = resp.dong_dau_tien;
            $scope.$apply();
          }
        });
        
      };

      $scope.upload_nhap_du_lieu = function() {
        upload_nhap_du_lieu(function(resp) {
          $scope.tai_danh_sach_upload_nhap_du_lieu();
        }, function(err) {

        });
      };

      $scope.tai_danh_sach_upload_nhap_du_lieu = function() {
        tai_danh_sach({
          ten_bang: 'upload_du_lieu',
          sap_xep: '_id',
          thu_tu: 'desc'
        }, function(ket_qua){
          $scope.danh_sach_upload_nhap_du_lieu = ket_qua.du_lieu;
          $scope.$apply();
        });
      };

      $scope.tai_danh_sach_upload_nhap_du_lieu();
      $scope.danh_sach_cot_nhap_du_lieu = {};
      $scope.nhap_du_lieu = function() {
        console.log($scope.danh_sach_cot_nhap_du_lieu);
        $.ajax({
          url: AP_API.tong_quat.url + '/nhap_du_lieu',
          type: 'post', dataType: 'json',
          data: {
            id_bo_thuoc_tinh: $scope.bo_thuoc_tinh_dang_chon._id.$oid,
            id_upload_du_lieu: $scope.upload_du_lieu_dang_chon._id.$oid,
            danh_sach_cot_nhap_du_lieu: $scope.danh_sach_cot_nhap_du_lieu,
            id_luoc_do: $scope.luoc_do._id.$oid,
            ma_luoc_do: $scope.luoc_do.ma_luoc_do
          },
          success: function(ket_qua) {
            var du_lieu = ket_qua.du_lieu;
            $scope.so_ban_ghi = du_lieu.so_ban_ghi;
            $scope.da_them = du_lieu.da_them;
            $scope.da_cap_nhat = du_lieu.da_cap_nhat;
            $scope.so_loi = du_lieu.so_loi;
            $scope.$apply();
            
          }
        })
      }
    }
  ]);

  var Upload = function(file) {
    this.file = file;
  };

  Upload.prototype.getType = function() {
    return this.file.type;
  };
  Upload.prototype.getSize = function() {
    return this.file.size;
  };
  Upload.prototype.getName = function() {
    return this.file.name;
  };
  Upload.prototype.setUploadUrl = function(url) {
    this.uploadUrl = url;
  };
  Upload.prototype.doUpload = function(onSuccess, onError) {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("upload_file", true);

    if(this.getName().indexOf('.xls') == -1 && this.getName().indexOf('.csv') == -1) {
      return false;
    }
    
    $.ajax({
      type: "POST",
      url: this.uploadUrl,
      xhr: function() {
        var myXhr = $.ajaxSettings.xhr();
        if (myXhr.upload) {
          myXhr.upload.addEventListener('progress', that.progressHandling, false);
        }
        return myXhr;
      },
      success: function(data) {
        // your callback here
        onSuccess(data);
      },
      error: function(error) {
        // handle error
        onError(error);
      },
      async: true,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      timeout: 60000
    });
  };

  Upload.prototype.progressHandling = function(event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
      percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar--upload").css("width", +percent + "%");
    $(progress_bar_id + " .status").text(percent + "%");
  };

  function upload_nhap_du_lieu(onSuccess, onError) {
    var file_nhap_du_lieu = jQuery('#file_nhap_du_lieu')[0];
    if (file_nhap_du_lieu.files.length) {
      var file_upload = new Upload(file_nhap_du_lieu.files[0]);
      file_upload.setUploadUrl(AP_API.tong_quat.url +'/upload_du_lieu');
      file_upload.doUpload(onSuccess, onError);
    }
  }
</script>