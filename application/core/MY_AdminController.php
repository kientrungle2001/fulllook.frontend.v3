<?php
class MY_AdminController extends MY_Controller {
	public $module;
	public $table;
	public $table_model;
	
	public function index() {
		$request_filters = [];
		if(isset($this->request_filters)) {
			foreach($this->request_filters as $field) {
				$value = $this->input->post_get($field['index']);
				if(null !== $value) {
					if(isset($field['type'])) {
						if($field['type'] == 'bool') {
							if($value == '0') {
								$request_filters[$field['index']] = 0;
							} else if($value == '1') {
								$request_filters[$field['index']] = 1;		
							}
						}
					} else {
						$request_filters[$field['index']] = $value;
					}
				}
			}
		}
		
		$index_view = $this->get_view_path('index');
		$this->render($index_view, ['request_filters' => $request_filters]);
	}

	public function get_view_folder($name) {
		if($this->has_view('admin/'.$this->module . '/' . $name)) {
			return $this->module;
		}
		return 'general';
	}

	public function get_view_path($name) {
		return 'admin/' . $this->get_view_folder($name) . '/' . $name;
	}

	public function edit($id) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $table_model->get_one($id);
		$edit_view = $this->get_view_path('edit');
		$this->render($edit_view, ['id' => $id, 'item' => $item]);
	}

	public function add() {
		$add_view = $this->get_view_path('add');
		$this->render($add_view);
	}

	public $pageSizes = [10, 20, 30, 50, 100, 200, 1000, 2000, 5000];
	public $pageSize = 50;
	public $pageNum = 0;
	
}
