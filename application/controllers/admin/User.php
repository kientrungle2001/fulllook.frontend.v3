<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_AdminController {
	public $title = 'Người dùng';
	public $module = 'user';
	public $table = 'user';
	public $table_model = 'user_model';

	public $request_filters = [
		['index' => 'type'], 
		['index' => 'classes'], 
		['index' => 'trial', 'type' => 'bool'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $sortBys = [
		['value' => 'user.id desc', 'label' => 'ID giảm'],
		['value' => 'user.id asc', 'label' => 'ID tăng'],
	];
	public $sort = 'user.id desc';
	public $sortFields = [
		['index' => 'user.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'user.name', 'alias' => 'name', 'label' => 'Họ tên'],
		['index' => 'user.username', 'alias' => 'username', 'label' => 'Tên đăng nhập'],
	];

	public $filterFields = [
		[
			'index' => 'categoryIds', 'label' => 'Danh mục',	'type' => 'multiselect/dialog/simple/ajax',
			'controller' => 'category', 'table' => 'categories',	'fields' => 'id,name,parent,parents,ordering',
			'sort' => 'ordering asc, name asc',
			'where' => ['status' => 1, 'display' => 1,	'type' => 'user',	'software' => 1],
			'valueField' => 'id',	'labelField' => 'name',
			'pageSize' => 2000
		],
		[
			'index' => 'class', 'label' => 'Lớp', 'type' => 'select/dialog/simple/ajax', 'labelField' => 'label', 'valueField' => 'value',
			'options' => [['value' => 3, 'label' => 'Lớp 3'],['value' => 4, 'label' => 'Lớp 4'],['value' => 5, 'label' => 'Lớp 5'],]
		],
		['index' => 'trial', 'label' => 'Dùng thử', 'type' => 'status/toggle'],
		['index' => 'status', 'label' => 'Trạng thái', 'type' => 'status/toggle'],
	];

	public $edits = [
		[
			'index' => 'basic',	'label'	=> 'Cơ bản',
			'fields' => [
				['type' => 'text',	'label' => 'Tên đăng nhập',	'index' => 'username', 'md' => 4],
				['type' => 'text',	'label' => 'Mật khẩu',	'index' => 'password', 'md' => 4],
				['type' => 'text',	'label' => 'Email',	'index' => 'email', 'md' => 4],
				['type' => 'text',	'label' => 'Số điện thoại',	'index' => 'phone', 'md' => 4],
				['type' => 'text',	'label' => 'Địa chỉ',	'index' => 'address', 'md' => 4],
				['type' => 'date',	'label' => 'Ngày sinh',	'index' => 'birthday', 'md' => 4],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 3, 'enabled' => 'Kích hoạt', 'disabled' => 'Chưa kích hoạt'],
				['type' => 'status',	'label' => 'Trạng thái liên hệ',	'index' => 'contactStatus', 'md' => 3, 'enabled' => 'Đã liên hệ', 'disabled' => 'Chưa liên hệ'],
				['type' => 'status',	'label' => 'Giới tính',	'index' => 'sex', 'md' => 2, 'enabled' => 'Nam', 'disabled' => 'Nữ'],
				['type' => 'text',	'label' => 'Phân loại',	'index' => 'type', 'md' => 4],
				['type' => 'text',	'label' => 'Lớp',	'index' => 'class', 'md' => 4],
				['type' => 'text',	'label' => 'Tỉnh thành',	'index' => 'areacode', 'md' => 4],
				['type' => 'text',	'label' => 'Quận huyện',	'index' => 'district', 'md' => 4],
				['type' => 'text',	'label' => 'Trường',	'index' => 'school', 'md' => 4],
			]
		],
		[
			'index' => 'advanced',
			'label'	=> 'Nâng cao',
			'fields' => [
				['type' => 'select', 'label' => 'Người tạo', 'index' => 'creatorId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'datetime-local', 'label' => 'Ngày tạo', 'index' => 'created', 'md' => 5],
				['type' => 'select', 'label' => 'Người sửa', 'index' => 'modifiedId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'datetime-local', 'label' => 'Ngày sửa', 'index' => 'modified', 'md' => 5],
				['type' => 'text', 'label' => 'Phần mềm', 'index' => 'software', 'md' => 2],
				['type' => 'text', 'label' => 'Chia sẻ phần mềm', 'index' => 'sharedSoftwares', 'md' => 5],
				['type' => 'text', 'label' => 'Avatar', 'index' => 'avatar', 'md' => 3],
			]
		]
	];
}