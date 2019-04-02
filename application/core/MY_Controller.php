<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $layout = 'layout';
	public function render($view, $data = null, $return = false) {
		if(!$data) $data = [];
		$data['view'] = $view;
		return $this->view($this->layout, $data, $return);
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
		$app_name = $this->app('name');
		$view_packages = $this->device('view_packages');
		$view_path = $view;
		foreach($view_packages as $view_package) {
			if(is_file(APPPATH.'views/' . $app_name . '/' . $view_package . '/' . $view . '.php')) {
				$view_path = $app_name . '/' . $view_package . '/' . $view;
				break;
			}
		}
		return $this->load->view($view_path, $data, $return);
	}
	public function css_libraries() {
		$app_name = $this->app('name');
		$css_libraries_packages = $this->device('css_libraries');
		foreach($css_libraries_packages as $package) {
			$css_libraries = $this->package($package, 'css_libraries');
			foreach($css_libraries as $library) {
				// $css_path = '/assets/css/' . $app_name . '/' . $package . '/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
				$css_path = '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
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
					$js_path = '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
					echo '<script src="'.$js_path.'"></script>';
				} elseif(isset($library['files'])) {
					foreach($library['files'] as $file) {
						$js_path = '/assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $file;
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
				$css_path = '/assets/css/' . $app_name . '/' . $css_package . '/' . $css . '?_=' . filemtime($file);
				echo '<link href="'.$css_path.'" rel="stylesheet" />';
			}
		}
		if(is_file($file = FCPATH.'assets/css/' . $app_name . '/' . $css)) {
			$css_path = '/assets/css/' . $app_name . '/' . $css . '?_=' . filemtime($file);
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
				$js_path = '/assets/js/' . $app_name . '/' . $js_package . '/' . $js . '?_='.filemtime($file);
				echo '<script src="'.$js_path.'"></script>';
				return ;
			}
		}

		if(is_file($file = FCPATH . 'assets/js/' . $app_name . '/' . $js)) {
			$js_path = '/assets/js/' . $app_name . '/' . $js . '?_=' . filemtime($file);
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