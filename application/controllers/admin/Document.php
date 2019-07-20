<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_AdminController {

	public $title = 'Tài liệu';
	public $table = 'document';
	public $module = 'document';
	public $table_model = 'document_model';

	public $request_filters = [
		['index' => 'type'], 
		['index' => 'classes'], 
		['index' => 'trial', 'type' => 'bool'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $sortBys = [
		['value' => 'document.id desc', 'label' => 'ID giảm'],
		['value' => 'document.id asc', 'label' => 'ID tăng'],
	];
	public $sort = 'document.id desc';
	public $sortFields = [
		['index' => 'document.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'document.name', 'alias' => 'name', 'label' => 'Tiêu đề'],
		['index' => 'document.ordering', 'alias' => 'ordering', 'label' => 'Thứ tự'],
	];

	public $filterFields = [
		[
			'index' => 'categoryIds', 'label' => 'Danh mục',	'type' => 'multiselect/dialog/simple/ajax',
			'controller' => 'category', 'table' => 'categories',	'fields' => 'id,name,parent,parents,ordering',
			'sort' => 'ordering asc, name asc',
			'where' => ['status' => 1, 'display' => 1,	'type' => 'document',	'software' => 1],
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
				['type' => 'text',	'label' => 'Tên tài liệu',	'index' => 'title', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên theo TĐN',	'index' => 'tdn_title', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên tiếng Anh',	'index' => 'en_title', 'md' => 8, 'size' => 10],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
				['type' => 'status',	'label' => 'Ẩn',	'index' => 'hidden', 'md' => 2],
				['type' => 'status',	'label' => 'Dùng thử',	'index' => 'trial', 'md' => 2],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 2],
				['type' => 'select/select2', 'multiple' => 'true', 'select2Options' => 'multipleSelect2Options',	'label' => 'Lớp',	'index' => 'classes', 'md' => 5, 'options'=> [ ['value' => 3, 'label' => 'Lớp 3'], ['value' => 4, 'label' => 'Lớp 4'], ['value' => 5, 'label' => 'Lớp 5'], ]],
				['type' => 'select', 'label' => 'Kiểu',	'index' => 'type', 'md' => 3, 'options'=> [ ['value' => 'document', 'label' => 'Tài liệu'], ['value' => 'vocabulary', 'label' => 'Từ vựng'], ]],
				['type' => 'textarea',	'label' => 'Mô tả',	'index' => 'brief', 'md' => 24, 'size' => 10],
				['type' => 'tinymce',	'label' => 'Nội dung',	'index' => 'content', 'md' => 24, 'size' => 10],
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