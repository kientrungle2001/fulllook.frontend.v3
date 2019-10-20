<?php $controller->js('controller/dia_diem.js')?>
<div class="container-fluid" ng-controller="dia_diem_controller">
  <h1 class="text-center">Địa điểm</h1>
  <div class="row">
  <div class="col-md-8">
  <form>
    <div class="form-row">
    <div class="form-group col-md-12">
    <input class="form-control" placeholder="Tên tỉnh">
    </div>
    <div class="form-group col-md-6">
    <input class="form-control" placeholder="Mã tỉnh">
    </div>
    <div class="form-group col-md-6">
    <button class="btn btn-primary form-control">Thêm tỉnh</button>
    </div>
    </div>
  </form>
  <table class="table table-sm table-bordered">
    <tr>
      <th>ID</th>
      <th>Tên tỉnh</th>
      <th>Mã tỉnh</th>
      <th><span class="fa fa-circle"></span></th>
      <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
      <th>DS Huyện</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Hà Nội</td>
      <td>034</td>
      <td><span class="fa fa-circle text-success"></span></td>
      <td><span class="fa fa-pencil text-primary"></span> <span class="fa fa-trash text-danger"></span></td>
      <td><a href="#">DS Huyện</a></td>
    </tr>
  </table>
  </div>
  <div class="col-md-8">
  <form>
    <div class="form-row">
    <div class="form-group col-md-12">
    <input class="form-control" placeholder="Tên huyện">
    </div>
    <div class="form-group col-md-6">
    <input class="form-control" placeholder="Mã huyện">
    </div>
    <div class="form-group col-md-6">
    <button class="btn btn-primary form-control">Thêm huyện</button>
    </div>
    </div>
  </form>
  <table class="table table-sm table-bordered">
    <tr>
      <th>ID</th>
      <th>Tên huyện</th>
      <th>Mã huyện</th>
      <th><span class="fa fa-circle"></span></th>
      <th><span class="fa fa-pencil"></span> <span class="fa fa-trash"></span></th>
    </tr>
    <tr>
      <td>1</td>
      <td></td>
    </tr>
  </table>
  </div>
  </div>
</div>