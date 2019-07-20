<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_AdminController {

	public $title = 'Tin tức';
	public $module = 'payment';
	public $table = 'history_payment';
	public $table_model = 'payment_model';

	public $request_filters = [
		['index' => 'type'], 
		['index' => 'classes'], 
		['index' => 'trial', 'type' => 'bool'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $pageSizes = [10, 20, 30, 50, 100, 200, 1000, 2000, 5000];
	public $pageSize = 50;
	public $pageNum = 0;
	public $sortBys = [
		['value' => 'history_payment.id desc', 'label' => 'ID giảm'],
		['value' => 'history_payment.id asc', 'label' => 'ID tăng'],
	];
	public $sort = 'history_payment.id desc';
	public $sortFields = [
		['index' => 'history_payment.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'history_payment.name', 'alias' => 'name', 'label' => 'Nội dung'],
	];

	public $filterFields = [
		[
			'index' => 'categoryIds', 'label' => 'Danh mục',	'type' => 'multiselect/dialog/simple/ajax',
			'controller' => 'category', 'table' => 'categories',	'fields' => 'id,name,parent,parents,ordering',
			'sort' => 'ordering asc, name asc',
			'where' => ['status' => 1, 'display' => 1,	'router like' => '%ngonngu%',	'software' => 1],
			'valueField' => 'id',	'labelField' => 'name',
			'pageSize' => 2000
		],
		[
			'index' => 'classes', 'label' => 'Lớp', 'type' => 'multiselect/dialog/simple/ajax',
			'options' => [['value' => 3, 'label' => 'Lớp 3'],['value' => 4, 'label' => 'Lớp 4'],['value' => 5, 'label' => 'Lớp 5'],]
		],
		['index' => 'trial', 'label' => 'Dùng thử', 'type' => 'status/toggle'],
		['index' => 'status', 'label' => 'Trạng thái', 'type' => 'status/toggle'],
	];

	public $edits = [
		[
			'index' => 'basic',	'label'	=> 'Cơ bản',
			'fields' => [
				['type' => 'text',	'label' => 'Tiêu đề',	'index' => 'title', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Bí danh',	'index' => 'alias', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Hình ảnh',	'index' => 'img', 'md' => 8, 'size' => 10],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
				['type' => 'status',	'label' => 'Toàn cục',	'index' => 'global', 'md' => 2],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 2],
				['type' => 'textarea',	'label' => 'Tóm tắt',	'index' => 'brief', 'md' => 24],
				['type' => 'tinymce',	'label' => 'Nội dung',	'index' => 'content', 'md' => 24],
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