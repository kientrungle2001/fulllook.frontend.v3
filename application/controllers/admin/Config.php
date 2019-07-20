<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_AdminController {

	public $module = 'config';
	public $table = 'config';
	public $table_model = 'config_model';
	public $title = 'Cấu hình';

	public function edit($id) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $table_model->get_one($id);
		$this->render('admin/general/edit', ['id' => $id, 'item' => $item]);
	}
	
	public $request_filters = [
		['index' => 'type'], 
		['index' => 'status', 'type' => 'bool'], 
	];

	public $sortBys = [
		['value' => 'config.id desc', 'label' => 'ID giảm'],
		['value' => 'config.id asc', 'label' => 'ID tăng'],
		['value' => 'config.ordering desc', 'label' => 'Thứ tự giảm'],
		['value' => 'config.ordering asc', 'label' => 'Thư tự tăng']
	];
	public $sort = 'config.ordering asc';
	public $sortFields = [
		['index' => 'config.id', 'alias' => 'id', 'label' => 'ID'],
		['index' => 'config.ordering', 'alias' => 'ordering', 'label' => 'Thứ tự'],
		['index' => 'config.mkey', 'alias' => 'mkey', 'label' => 'Khóa'],
	];

	public $filterFields = [
		['index' => 'status', 'label' => 'Trạng thái', 'type' => 'status/toggle'],
	];

	public $edits = [
		[
			'index' => 'basic',	'label'	=> 'Cơ bản',
			'fields' => [
				['type' => 'text',	'label' => 'Type',	'index' => 'type', 'md' => 4, 'size' => 10],
				['type' => 'text',	'label' => 'Key',	'index' => 'mkey', 'md' => 4, 'size' => 10],
				['type' => 'text',	'label' => 'Thứ tự',	'index' => 'ordering', 'md' => 4, 'size' => 10],
				['type' => 'textarea',	'label' => 'Giải thích',	'index' => 'mvalue', 'md' => 24, 'size' => 10],
				['type' => 'status',	'label' => 'Trạng thái',	'index' => 'status', 'md' => 2],
			]
		]
	];
}