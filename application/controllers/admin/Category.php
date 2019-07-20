<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_AdminController {

	public $title = 'Danh mục';
	public $module = 'category';
	public $table = 'categories';
	public $table_model = 'category_model';

	public $request_filters = [
		['index' => 'type'], 
		['index' => 'classes'], 
		['index' => 'trial', 'type' => 'bool'], 
		['index' => 'status', 'type' => 'bool'], 
		['index' => 'display', 'type' => 'bool']
	];

	public $pageSize = 5000;
	public $sortBys = [
		['value' => 'categories.id desc', 'label' => 'ID giảm'],
		['value' => 'categories.id asc', 'label' => 'ID tăng'],
		['value' => 'categories.ordering desc', 'label' => 'Thứ tự giảm'],
		['value' => 'categories.ordering asc', 'label' => 'Thư tự tăng']
	];
	public $sort = 'categories.ordering asc';
	public $sortFields = [
		['index' => 'categories.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'categories.ordering', 'alias' => 'ordering', 'label' => 'Thứ tự'],
		['index' => 'categories.name', 'alias' => 'name', 'label' => 'Nội dung'],
	];

	public $filterFields = [
		[
			'index' => 'classes', 'label' => 'Lớp', 'type' => 'multiselect/dialog/simple/ajax',
			'options' => [['value' => 3, 'label' => 'Lớp 3'],['value' => 4, 'label' => 'Lớp 4'],['value' => 5, 'label' => 'Lớp 5'],]
		],
		['index' => 'trial', 'label' => 'Dùng thử', 'type' => 'status/toggle'],
		['index' => 'display', 'label' => 'Hiển thị', 'type' => 'status/toggle'],
		['index' => 'status', 'label' => 'Trạng thái', 'type' => 'status/toggle'],
	];

	public $edits = [
		[
			'index' => 'basic',	'label'	=> 'Cơ bản',
			'fields' => [
				['type' => 'text',	'label' => 'Tên danh mục',	'index' => 'name', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên tiếng Việt',	'index' => 'name_vn', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên tiếng Anh',	'index' => 'name_en', 'md' => 8, 'size' => 10],
				['type' => 'select',	'label' => 'Danh mục',	'index' => 'parent', 'md' => 12, 'size' => 1, 'multiple' => false,
					'table' => 'categories', 'fields' => 'id,name,ordering,parent,parents', 'where' => [
						'software' => 1
					], 'sort' => 'ordering asc, name asc, id asc', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
				['type' => 'status',	'label' => 'Dùng thử',	'index' => 'trial', 'md' => 2],
				['type' => 'status',	'label' => 'Tài liệu',	'index' => 'document', 'md' => 2],
				['type' => 'status',	'label' => 'Hiển thị',	'index' => 'display', 'md' => 2],
				['type' => 'status',	'label' => 'Đã xóa',	'index' => 'deleted', 'md' => 2],
				['type' => 'status',	'label' => 'Toàn cục',	'index' => 'global', 'md' => 2],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 2],
				['type' => 'select/select2', 'multiple' => 'true', 'select2Options' => 'multipleSelect2Options',	'label' => 'Lớp',	'index' => 'classes', 'md' => 5, 'options'=> [ ['value' => 3, 'label' => 'Lớp 3'], ['value' => 4, 'label' => 'Lớp 4'], ['value' => 5, 'label' => 'Lớp 5'], ]],
			]
		],
		[
			'index' => 'advanced',
			'label'	=> 'Nâng cao',
			'fields' => [
				['type' => 'select', 'label' => 'Người tạo', 'index' => 'creatorId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'select', 'label' => 'Người sửa', 'index' => 'modifiedId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'text', 'label' => 'Phần mềm', 'index' => 'software', 'md' => 2],
				['type' => 'text', 'label' => 'Chia sẻ phần mềm', 'index' => 'sharedSoftwares', 'md' => 5],
			]
		]
	];
}