<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $layout = 'layout';
	public function render($view, $data = null, $return = false) {
		if(!$data) $data = [];
		$data['view'] = $view;
		return $this->view($this->layout, $data, $return);
	}

	public function load_config_from_db($key) {
		$this->load->model('config_model');
		$config = $this->config_model->get_variable('controller', $key);
		if($config !== null) {
			foreach($config as $key => $value) {
				$this->$key = $value;
			}
		}
		
	}

	public function view($view, $data = null, $return = false) {
		if(!$data) {
			$data = [];
		}
		$data['agent'] = isset($this->agent) ? $this->agent : null;
		$data['db'] = isset($this->db) ? $this->db : null;
		$data['config'] = isset($this->config) ? $this->config : null;
		$data['controller'] = $this;
		$data['data'] = $data;
		$view_path = $this->get_view($view);
		return $this->load->view($view_path, $data, $return);
	}
	public function get_view($view) {
		$app_name = $this->app('name');
		$view_packages = $this->device('view_packages');
		$view_path = $view;
		foreach($view_packages as $view_package) {
			if(is_file(APPPATH.'views/' . $app_name . '/' . $view_package . '/' . $view . '.php')) {
				$view_path = $app_name . '/' . $view_package . '/' . $view;
				break;
			}
		}
		return $view_path;
	}
	public function has_view($view) {
		$app_name = $this->app('name');
		$view_packages = $this->device('view_packages');
		foreach($view_packages as $view_package) {
			if(is_file(APPPATH.'views/' . $app_name . '/' . $view_package . '/' . $view . '.php')) {
				return true;
			}
		}
		return false;
	}
	public function css_libraries() {
		$app_name = $this->app('name');
		$css_libraries_packages = $this->device('css_libraries');
		foreach($css_libraries_packages as $package) {
			$css_libraries = $this->package($package, 'css_libraries');
			foreach($css_libraries as $library) {
				// $css_path = '/assets/css/' . $app_name . '/' . $package . '/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
				$css_path = base_url() . '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
				echo '<link href="'.$css_path.'" rel="stylesheet" />';
			}
		}
	}
	public function js_libraries() {
		$app_name = $this->app('name');
		$js_libraries_packages = $this->device('js_libraries');
		foreach($js_libraries_packages as $package) {
			$js_libraries = $this->package($package, 'js_libraries');
			foreach($js_libraries as $library) {
				// $js_path = '/assets/js/' . $app_name . '/' . $package . '/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
				if(isset($library['file'])) {
					$js_path = base_url() . '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
					echo '<script src="'.$js_path.'"></script>';
				} elseif(isset($library['files'])) {
					foreach($library['files'] as $file) {
						$js_path = base_url() . '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $file;
						echo '<script src="'.$js_path.'"></script>';
					}
				}
				
			}
		}
	}
	public function css($css) {
		$app_name = $this->app('name');
		$css_packages = $this->device('css_packages');
		foreach($css_packages as $css_package) {
			if(is_file($file = FCPATH.'assets/css/' . $app_name . '/' . $css_package . '/' . $css)) {
				$css_path = base_url() . '/assets/css/' . $app_name . '/' . $css_package . '/' . $css . '?_=' . filemtime($file);
				echo '<link href="'.$css_path.'" rel="stylesheet" />';
			}
		}
		if(is_file($file = FCPATH.'assets/css/' . $app_name . '/' . $css)) {
			$css_path = base_url() . '/assets/css/' . $app_name . '/' . $css . '?_=' . filemtime($file);
			echo '<link href="'.$css_path.'" rel="stylesheet" />';
		}
	}
	public $_jses = [];
	public function js($js) {
		if(in_array($js, $this->_jses)) return false;
		$this->_jses[] = $js;
		$app_name = $this->app('name');
		$js_packages = $this->device('js_packages');
		
		foreach($js_packages as $js_package) {
			if(is_file($file = FCPATH.'assets/js/' . $app_name . '/' . $js_package . '/' . $js)) {
				$js_path = base_url() . '/assets/js/' . $app_name . '/' . $js_package . '/' . $js . '?_='.filemtime($file);
				echo '<script src="'.$js_path.'"></script>';
				return ;
			}
		}

		if(is_file($file = FCPATH . 'assets/js/' . $app_name . '/' . $js)) {
			$js_path = base_url() . '/assets/js/' . $app_name . '/' . $js . '?_=' . filemtime($file);
			echo '<script src="'.$js_path.'"></script>';
		}
	}
	private $app = null;
	public function app($field = false) {
		if($this->app) {
			if($field) return $this->app[$field];
			return $this->app;
		}
		$host = $_SERVER['HTTP_HOST'];
		$apps = $this->config->item('apps');
		foreach($apps as $app) {
			if($app['host'] == $host || in_array($host, $app['aliases'])) {
				$this->app = $app;
				if($field) return $app[$field];
				return $app;
			}
		}
		$app = $apps[0];

		if($app['host'] == $host) {
			$this->app = $app;
			if($field) return $app[$field];
			return $app;
		}
	}
	private $device = null;
	public function device($field = false) {
		if($this->device) {
			if($field) return $this->device[$field];
			return $this->device;
		}
		$app = $this->app();
		foreach($app['devices'] as $device) {
			if($this->is_device($device)) {
				$this->device = $device['result'];
				return $this->device($field);
			}
		}
		return null;
	}

	public function is_device($device) {
		if($device['conds']) {
			return $device['conds']($this);
		} else {
			return true;
		}
		return true;
	}

	public function package($package, $field = false) {
		$app = $this->app();
		$packages = $this->config->item('packages');
		foreach($packages as $p) {
			if($p['name'] == $app['name']) {
				$devices = $p['devices'];
				foreach($devices as $device) {
					if($device['name'] == $package) {
						if($field) return $device[$field];
						return $device;
					}
				}
			}
		}
		return null;
	}

}

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

class MY_TableController extends MY_Controller {
	public $table_model;
	
	public function items($table = null, $pageSize = null, $pageNum = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		if(!$pageSize) {
			$pageSize = $this->input->get_post('pageSize', true);
		}
		if(!$pageNum) {
			$pageNum = $this->input->get_post('pageNum', true);
		}
		$select = $this->input->get_post('select', true);
		if(!$select) {
			$select = $this->input->get_post('fields', true);
		}
		$sort = $this->input->get_post('sort', true);
		
		if(!$table) {
			$table = $this->input->get_post('table', true);
		}
		
		$joins = $this->input->get_post('joins', true);
		
		$where = $this->input->get_post('where', true);
		
		if(!$pageSize) $pageSize = 10;
		if(!$pageNum) $pageNum = 0;
		$startFrom = $pageNum * $pageSize;
		
		if($select) {
			$table_model->select($select);
		}
		
		if($joins) {
			foreach($joins as $join) {
				$table_model->join($join[0], $join[1], isset($join[2]) ? $join[2] : 'inner');
			}
		}

		# filters
		if($where) {
			foreach ($where as $key => $value) {
				if(is_array($value)) {

					if(count($value)) {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$conds = [];
								foreach($value as $v) {
									$conds[] = $key. " like '%,$v,%'";
								}
								$table_model->db->where(implode(' or ', $conds));
							}
						} else {
							#has not filters
							$table_model->db->where_in($key, $value);
						}
					}
				} else {
					if($value !== '') {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$table_model->db->like($key, ','.$value.',');	
							}
						} else {
							# has not filters
							$table_model->db->where($key, $value);
						}
					}
				}
			}
		}
		
		# pagination
		$table_model->db->limit($pageSize, $startFrom);
		
		# sort
		$table_model->db->order_by($sort);
		$items = $table_model->db->get($table);
		$items = $table_model->result_array($items);

		# count
		if($select) {
			$this->db->select($select);
		}
		
		# join
		if($joins) {
			foreach($joins as $join) {
				$this->db->join($join[0], $join[1], isset($join[2]) ? $join[2] : 'inner');
			}
		}
		
	# filters
	if($where) {
		foreach ($where as $key => $value) {
			if(is_array($value)) {

				if(count($value)) {
					# has filters
					if(isset($this->filters) && isset($this->filters[$key])) {
						if($this->filters[$key]['type'] == 'like') {
							$conds = [];
							foreach($value as $v) {
								$conds[] = $key. " like '%,$v,%'";
							}
							$this->db->where(implode(' or ', $conds));
						}
					} else {
						#has not filters
						$this->db->where_in($key, $value);
					}
				}
			} else {
				if($value !== '') {
					# has filters
					if(isset($this->filters) && isset($this->filters[$key])) {
						if($this->filters[$key]['type'] == 'like') {
							$this->db->like($key, ','.$value.',');	
						}
					} else {
						# has not filters
						$this->db->where($key, $value);
					}
				}
			}
		}
	}

		$count_items = $this->db->count_all_results($table);
		foreach($items as &$item) {
			$this->format($item);
		}
		$result = [
			'rows' => $items,
			'total' => $count_items
		];
		echo json_encode($result);
	}

	public function item($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $table_model->get_one($id);
		echo json_encode($item);
	}

	public function update($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $this->input->post('item');
		$table_model->update($id, $item);
		echo 1;
	}
	public function remove($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$id = $this->input->post('id');
		$table_model->remove($id);
		echo 1;
	}
	public function add($table = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $this->input->post('item');
		$table_model->insert($item);
		$result = [
			'id' => $table_model->db->insert_id()
		];
		echo json_encode($result);
	}

	public function format(&$item) {
		if(isset($this->metadata)) {
			foreach($this->metadata as $field => $settings) {
				if($settings['type'] == 'int') {
					if(isset($item[$field]))
						$item[$field] = intval($item[$field]);
				} elseif($settings['type'] == 'bool') {
					if(isset($item[$field]))
						$item[$field] = boolval(intval($item[$field]));
				} elseif($settings['type'] == 'array') {
					if(isset($item[$field])) {
						$values = explode(',', $item[$field]);
						$item[$field] = [];
						foreach($values as $value) {
							if($value) {
								$item[$field][] = intval($value);
							}
						}
					}
						
				}
			}
		}
	}
}