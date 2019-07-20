<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_AdminController {
	public $title = 'Đề thi';
	public $module = 'test';
	public $table = 'tests';
	public $table_model = 'test_model';
	public $request_filters = [
		['index' => 'type'], 
		['index' => 'classes'], 
		['index' => 'trial', 'type' => 'bool'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $sortBys = [
		['value' => 'tests.id desc', 'label' => 'ID giảm'],
		['value' => 'tests.id asc', 'label' => 'ID tăng'],
		['value' => 'tests.ordering desc', 'label' => 'Thứ tự giảm'],
		['value' => 'tests.ordering asc', 'label' => 'Thư tự tăng']
	];
	public $sort = 'tests.ordering asc';
	public $sortFields = [
		['index' => 'tests.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'tests.ordering', 'alias' => 'ordering', 'label' => 'Thứ tự'],
		['index' => 'tests.name', 'alias' => 'name', 'label' => 'Nội dung'],
	];

	public $filterFields = [
		[
			'index' => 'categoryIds', 'label' => 'Danh mục',	'type' => 'multiselect/dialog/simple/ajax',
			'controller' => 'category', 'table' => 'categories',	'fields' => 'id,name,parent,parents,ordering',
			'sort' => 'ordering asc, name asc',
			'where' => ['status' => 1, 'display' => 1,	'router like' => '%ngonngu%',	'software' => 1, 'type' => 'test'],
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
				['type' => 'text',	'label' => 'Tên đề thi',	'index' => 'name', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên đề thi tiếng Anh',	'index' => 'name_en', 'md' => 8, 'size' => 10],
				['type' => 'text',	'label' => 'Tên đề thi song ngữ',	'index' => 'name_sn', 'md' => 8, 'size' => 10],
				['type' => 'select/select2',	'label' => 'Danh mục',	'index' => 'categoryIds', 'md' => 12, 'size' => 20, 'multiple' => 'true',
					'table' => 'categories', 'fields' => 'id,name,ordering,parent,parents', 'where' => [
						'software' => 1, 'type' => 'test'
					], 'sort' => 'ordering asc, name asc, id asc', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'select',	'label' => 'Loại đề thi',	'index' => 'trytest', 'md' => 4, 'options' => [ ['value' => 1, 'label' => 'Trắc nghiệm'], ['value' => 2, 'label' => 'Tự luận'] ]],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
				['type' => 'status',	'label' => 'Sắp xếp',	'index' => 'isSort', 'md' => 2],
				['type' => 'status',	'label' => 'Dùng thử',	'index' => 'trial', 'md' => 2],
				['type' => 'status',	'label' => 'Đề mới',	'index' => 'isNew', 'md' => 2],
				['type' => 'status',	'label' => 'Đề năng lực',	'index' => 'compability', 'md' => 2],
				['type' => 'status',	'label' => 'Toàn cục',	'index' => 'global', 'md' => 2],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 2],
				['type' => 'select/select2', 'multiple' => 'true', 'select2Options' => 'multipleSelect2Options',	'label' => 'Lớp',	'index' => 'classes', 'md' => 5, 'options'=> [ ['value' => 3, 'label' => 'Lớp 3'], ['value' => 4, 'label' => 'Lớp 4'], ['value' => 5, 'label' => 'Lớp 5'], ]],
				['type' => 'select',	'label' => 'Cuộc thi',	'index' => 'camp', 'md' => 12, 'multiple' => false,
					'table' => 'contest', 'fields' => 'id,name', 'sort' => 'id asc', 'valueField' => 'id', 'labelField' => 'name'],
			]
		],
		[
			'index' => 'advanced',
			'label'	=> 'Nâng cao',
			'fields' => [
				['type' => 'select', 'label' => 'Người tạo', 'index' => 'creatorId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				//['type' => 'datetime-local', 'label' => 'Ngày tạo', 'index' => 'created', 'md' => 5],
				['type' => 'select', 'label' => 'Người sửa', 'index' => 'modifiedId', 'md' => 3, 'table' => 'admin', 'sort' => 'name asc', 'fields' => 'id,name', 'valueField' => 'id', 'labelField' => 'name'],
				//['type' => 'datetime-local', 'label' => 'Ngày sửa', 'index' => 'modified', 'md' => 5],
			]
		]
	];
}