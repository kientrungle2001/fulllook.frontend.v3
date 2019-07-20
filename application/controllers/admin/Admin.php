<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_AdminController {

	public $table = 'admin';
	public $module = 'admin';

	public $request_filters = [
		['index' => 'usertype_id'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $sortBys = [
		['value' => 'admin.id desc', 'label' => 'ID giảm'],
		['value' => 'admin.id asc', 'label' => 'ID tăng'],
	];
	public $sort = 'admin.id desc';
	public $sortFields = [
		['index' => 'admin.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'admin.name', 'alias' => 'name', 'label' => 'Tên đăng nhập'],
		['index' => 'admin.usertype_id', 'alias' => 'usertype_id', 'label' => 'Vai trò'],
	];

	public $filterFields = [
		[
			'index' => 'categoryIds', 'label' => 'Danh mục',	'type' => 'multiselect/dialog/simple/ajax',
			'controller' => 'category', 'table' => 'categories',	'fields' => 'id,name,parent,parents,ordering',
			'sort' => 'ordering asc, name asc',
			'where' => ['status' => 1, 'display' => 1,	'type' => 'admin',	'software' => 1],
			'valueField' => 'id',	'labelField' => 'name',
			'pageSize' => 2000
		],
		[
			'index' => 'classes', 'label' => 'Lớp', 'type' => 'multiselect/dialog/simple/ajax', 'labelField' => 'label', 'valueField' => 'value',
			'options' => [['value' => 3, 'label' => 'Lớp 3'],['value' => 4, 'label' => 'Lớp 4'],['value' => 5, 'label' => 'Lớp 5'],]
		],
		['index' => 'trial', 'label' => 'Dùng thử', 'type' => 'status/toggle'],
		['index' => 'status', 'label' => 'Trạng thái', 'type' => 'status/toggle'],
	];

	public $edits = [
		[
			'index' => 'basic',	'label'	=> 'Cơ bản',
			'fields' => [
				['type' => 'text',	'label' => 'Tên đăng nhập',	'index' => 'name', 'md' => 4],
				['type' => 'text',	'label' => 'Mật khẩu',	'index' => 'password', 'md' => 4],
				['type' => 'select/select2', 'multiple' => 'false', 'select2Options' => 'singleSelect2Options',	'label' => 'Lớp',	'index' => 'classs', 'md' => 5, 'options'=> [ ['value' => 3, 'label' => 'Lớp 3'], ['value' => 4, 'label' => 'Lớp 4'], ['value' => 5, 'label' => 'Lớp 5'], ]],
				
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
			]
		]
	];
}