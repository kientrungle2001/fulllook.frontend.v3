<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_AdminController {

	public $module = 'errors';
	public $table = 'question_error';

	public $sortBys = [
		['value' => 'question_error.id desc', 'label' => 'ID giảm'],
		['value' => 'question_error.id asc', 'label' => 'ID tăng'],
		['value' => 'question_error.ordering desc', 'label' => 'Thứ tự giảm'],
		['value' => 'question_error.ordering asc', 'label' => 'Thư tự tăng']
	];
	public $sort = 'question_error.id desc';
	public $sortFields = [
		['index' => 'question_error.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'question_error.ordering', 'alias' => 'ordering', 'label' => 'Thứ tự'],
		['index' => 'question_error.name', 'alias' => 'name', 'label' => 'Nội dung'],
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
				['type' => 'tinymce',	'label' => 'Nội dung',	'index' => 'name', 'md' => 8, 'size' => 10],
				['type' => 'tinymce',	'label' => 'Nội dung',	'index' => 'name_vn', 'md' => 8, 'size' => 10],
				['type' => 'tinymce',	'label' => 'Giải thích',	'index' => 'explaination', 'md' => 8, 'size' => 10],
				['type' => 'select/select2',	'label' => 'Danh mục',	'index' => 'categoryIds', 'md' => 12, 'size' => 20, 'multiple' => 'true',
					'table' => 'news', 'fields' => 'id,name,ordering,parent,parents', 'where' => [
						'software' => 1
					], 'sort' => 'ordering asc, name asc, id asc', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'select/select2',	'label' => 'Đề thi',	'index' => 'newsId', 'md' => 12, 'size' => 20, 'multiple' => 'true',
					'table' => 'news', 'fields' => 'id,name,ordering,parent', 'where' => ['status' => 1,
					], 'sort' => 'ordering asc, name asc, id asc', 'valueField' => 'id', 'labelField' => 'name'],
				['type' => 'select',	'label' => 'Loại câu hỏi',	'index' => 'questionType', 'md' => 4, 'options' => [ ['value' => 1, 'label' => 'Trắc nghiệm'], ['value' => 4, 'label' => 'Tự luận'] ]],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
				['type' => 'status',	'label' => 'Dùng thử',	'index' => 'trial', 'md' => 2],
				['type' => 'status',	'label' => 'Khóa',	'index' => 'lock', 'md' => 2],
				['type' => 'status',	'label' => 'Có hình',	'index' => 'hasImage', 'md' => 2],
				['type' => 'status',	'label' => 'Có âm thanh',	'index' => 'hasAudio', 'md' => 2],
				['type' => 'status',	'label' => 'Đã dịch',	'index' => 'translated', 'md' => 2],
				['type' => 'status',	'label' => 'Đã xóa',	'index' => 'deleted', 'md' => 2],
				['type' => 'status',	'label' => 'Tự động',	'index' => 'auto', 'md' => 2],
				['type' => 'status',	'label' => 'Toàn cục',	'index' => 'global', 'md' => 2],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 2],
				['type' => 'select/select2', 'multiple' => 'true', 'select2Options' => 'multipleSelect2Options',	'label' => 'Lớp',	'index' => 'classes', 'md' => 5, 'options'=> [ ['value' => 3, 'label' => 'Lớp 3'], ['value' => 4, 'label' => 'Lớp 4'], ['value' => 5, 'label' => 'Lớp 5'], ]],
				['type' => 'text',	'label' => 'Độ khó',	'index' => 'level', 'md' => 2],
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