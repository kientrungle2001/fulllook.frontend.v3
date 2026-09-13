<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $layout = 'layout';

	public function call_action($action, ...$args)
	{
		if (is_string($action)) {
			if (class_exists($action)) {
				$action = new $action();
			} else {
				require_once 'action/' . $action . '.php';
				$action = new $action();
			}
		}
		$action->setController($this);
		return call_user_func_array([$action, 'execute'], $args);
	}

	public function render($view, $data = null, $return = false)
	{
		if (!$data) $data = [];
		$data['view'] = $view;
		return $this->view($this->layout, $data, $return);
	}

	public function load_pql_models(&$data)
	{
		$this->options_model->controller = $this;
		$this->posts_model->controller = $this;
		$this->terms_model->controller = $this;
		$this->links_model->controller = $this;
		$this->orders_model->controller = $this;
		$this->order_items_model->controller = $this;
		$data['options_model'] = $this->options_model;
		$data['posts_model'] = $this->posts_model;
		$data['terms_model'] = $this->terms_model;
		$data['links_model'] = $this->links_model;
		$data['orders_model'] = $this->orders_model;
		$data['order_items_model'] = $this->order_items_model;
	}

	public function load_config_from_db($key)
	{
		$this->load->model('config_model');
		$config = $this->config_model->get_variable('controller', $key);
		if ($config !== null) {
			foreach ($config as $key => $value) {
				$this->$key = $value;
			}
		}
	}

	public function tag($view, $data = null, $return = false, $cachable = false, $key = false)
	{
		return $this->view('tag/' . $view, $data, $return, $cachable, $key);
	}
	public function view($view, $data = null, $return = false, $cachable = false, $key = false)
	{
		if ($cachable) {
			$content = $this->cache->file->get($key);
			if (false !== $content) {
				if ($return) return $content;
				echo $content;
				return;
			}
		}
		if (!$data) {
			$data = [];
		}
		$data['agent'] = isset($this->agent) ? $this->agent : null;
		$data['db'] = isset($this->db) ? $this->db : null;
		$data['cf'] = $data['config'] = isset($this->config) ? $this->config : null;
		$data['controller'] = $this;
		$data['c'] = $this;
		$data['data'] = $data;
		$view_path = $this->get_view($view);
		$content = $this->load->view($view_path, $data, true);
		unset($data);
		if ($cachable) {
			$this->cache->file->save($key, $content, 1800);
		}
		if ($return)
			return $content;
		echo $content;
		return;
	}
	public function get_view($view)
	{
		$app_name = $this->app('name');
		$app_view_packages = $this->app('view_packages');
		if (!$app_view_packages) $app_view_packages = [$app_name];
		$view_packages = $this->device('view_packages');
		$view_path = $view;
		foreach ($view_packages as $view_package) {
			if (is_file(APPPATH . 'views/' . $app_name . '/' . $view_package . '/' . $view . '.php')) {
				$view_path = $app_name . '/' . $view_package . '/' . $view;
				break;
			}
			foreach ($app_view_packages as $app_view_package) {
				if (is_file(APPPATH . 'views/' . $app_view_package . '/' . $view_package . '/' . $view . '.php')) {
					$view_path = $app_view_package . '/' . $view_package . '/' . $view;
					break;
				}
			}
		}
		return $view_path;
	}
	public function has_view($view)
	{
		$app_name = $this->app('name');
		$view_packages = $this->device('view_packages');
		foreach ($view_packages as $view_package) {
			if (is_file(APPPATH . 'views/' . $app_name . '/' . $view_package . '/' . $view . '.php')) {
				return true;
			}
		}
		return false;
	}
	public function css_libraries()
	{
		$css_libraries_packages = $this->device('css_libraries');
		foreach ($css_libraries_packages as $package) {
			$css_libraries = $this->package($package, 'css_libraries');
			foreach ($css_libraries as $library) {
				$css_path = base_url() . 'assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
				echo '<link href="' . $css_path . '" rel="stylesheet" />' . PHP_EOL;
			}
		}
	}
	public function js_libraries()
	{
		$js_libraries_packages = $this->device('js_libraries');
		foreach ($js_libraries_packages as $package) {
			$js_libraries = $this->package($package, 'js_libraries');
			foreach ($js_libraries as $library) {
				if (isset($library['file'])) {
					$js_path = base_url() . 'assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $library['file'];
					echo '<script src="' . $js_path . '"></script>' . PHP_EOL;
				} elseif (isset($library['files'])) {
					foreach ($library['files'] as $file) {
						$js_path = base_url() . 'assets/libraries/' . $library['name'] . '/' . $library['version'] . '/' . $file;
						echo '<script src="' . $js_path . '"></script>' . PHP_EOL;
					}
				}
			}
		}
	}
	public function css($css, $first_match = false)
	{
		$app_name = $this->app('name');
		$app_view_packages = $this->app('view_packages');
		if (!$app_view_packages) $app_view_packages = [$app_name];
		$app_view_packages = array_reverse($app_view_packages);
		foreach ($app_view_packages as $app_view_package) {
			if (is_file($file = FCPATH . 'assets/css/' . $app_view_package . '/' . $css)) {
				$css_path = base_url() . 'assets/css/' . $app_view_package . '/' . $css . '?_=' . filemtime($file);
				echo '<link href="' . $css_path . '" rel="stylesheet" />' . PHP_EOL;
			}
		}

		$css_packages = $this->device('css_packages');
		foreach ($css_packages as $css_package) {
			foreach ($app_view_packages as $app_view_package) {
				if (is_file($file = FCPATH . 'assets/css/' . $app_view_package . '/' . $css_package . '/' . $css)) {
					$css_path = base_url() . 'assets/css/' . $app_view_package . '/' . $css_package . '/' . $css . '?_=' . filemtime($file);
					echo '<link href="' . $css_path . '" rel="stylesheet" />' . PHP_EOL;
					if ($first_match) {
						return;
					}
				}
			}
		}
	}
	public $_jses = [];
	public function js($js)
	{
		if (in_array($js, $this->_jses)) return false;
		$this->_jses[] = $js;
		$app_name = $this->app('name');
		$app_view_packages = $this->app('view_packages');
		if (!$app_view_packages) $app_view_packages = [$app_name];
		$js_packages = $this->device('js_packages');

		foreach ($js_packages as $js_package) {
			foreach ($app_view_packages as $app_view_package) {
				if (is_file($file = FCPATH . 'assets/js/' . $app_view_package . '/' . $js_package . '/' . $js)) {
					$js_path = base_url() . 'assets/js/' . $app_view_package . '/' . $js_package . '/' . $js . '?_=' . filemtime($file);
					echo '<script src="' . $js_path . '"></script>' . PHP_EOL;
					return;
				}
			}
		}

		foreach ($app_view_packages as $app_view_package) {
			if (is_file($file = FCPATH . 'assets/js/' . $app_view_package . '/' . $js)) {
				$js_path = base_url() . 'assets/js/' . $app_view_package . '/' . $js . '?_=' . filemtime($file);
				echo '<script src="' . $js_path . '"></script>' . PHP_EOL;
				return;
			}
		}
	}
	private $app = null;
	public function app($field = false)
	{
		if ($this->app) {
			if ($field) return $this->app[$field];
			return $this->app;
		}
		$host = $_SERVER['HTTP_HOST'];
		$apps = $this->config->item('apps');
		foreach ($apps as $app) {
			if ($app['host'] == $host || in_array($host, $app['aliases'])) {
				$this->app = $app;
				if ($field) return $app[$field];
				return $app;
			}
		}
		$app = $apps[0];

		if ($app['host'] == $host) {
			$this->app = $app;
			if ($field) return $app[$field];
			return $app;
		}
	}
	private $device = null;
	public function device($field = false)
	{
		if ($this->device) {
			if ($field) return $this->device[$field];
			return $this->device;
		}
		$app = $this->app();
		foreach ($app['devices'] as $device) {
			if ($this->is_device($device)) {
				$this->device = $device['result'];
				return $this->device($field);
			}
		}
		return null;
	}

	public function is_device($device)
	{
		if ($device['conds']) {
			return $device['conds']($this);
		} else {
			return true;
		}
		return true;
	}

	public function package($package, $field = false)
	{
		$app = $this->app();
		$packages = $this->config->item('packages');
		foreach ($packages as $p) {
			if ($p['name'] == $app['name']) {
				$devices = $p['devices'];
				foreach ($devices as $device) {
					if ($device['name'] == $package) {
						if ($field) return $device[$field];
						return $device;
					}
				}
			}
		}
		return null;
	}

	public function getCatName($cat, $language)
	{
		return wpglobus($cat['name'], $language);
	}

	public function getProductCatLink($cat, $language, $parents = [])
	{
		$parents = array_reverse($parents);
		return $this->links_model->get_product_category_link(
			$language,
			$cat,
			isset($parents[0]) ? $parents[0] : null,
			isset($parents[1]) ? $parents[1] : null,
			isset($parents[2]) ? $parents[2] : null
		);
	}

	public function getNewsCatLink($cat, $language)
	{
		return $this->links_model->get_news_category_link($language, $cat);
	}

	public function getHomeTitle($language)
	{
		return wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language);
	}

	public function getProductImage($product)
	{
		return $this->getPostImage($product);
	}

	public function getProductLink($product, $category, $language, $parent_categories = [])
	{
		return $this->links_model->get_product_link($language, $category, $product, $parent_categories);
	}

	public function getProductTitle($product, $language)
	{
		return wpglobus($product['post_title'], $language);
	}

	public function getPostImage($post)
	{
		return $this->posts_model->get_post_thumbnail_img($post);
	}

	public function json($arr, $status = '200')
	{
		echo json_encode($arr);
		$this->output->set_status_header($status);
	}
}

require_once 'MY_AdminController.php';
require_once 'MY_TableController.php';

class MY_Action
{
	public $controller;
	public function setController($controller)
	{
		$this->controller = $controller;
	}
}
