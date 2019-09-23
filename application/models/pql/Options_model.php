<?php
class Options_model extends Abstract_Table_Model
{
	public $table = 'bv_options';
	public function get_option($key, $type = 1) {
		$this->select('*');
		$this->where('option_name', $key);
		$rs = $this->get(0, 1);
		$row = $this->row_array($rs);
		if($type == 0) {
			return $row['option_value'];
		} elseif($type == 1) {
			return unserialize($row['option_value']);
		} elseif($type == 2) {
			return json_decode($row['option_value'], true);
		}
		return $row['option_value'];
	}

	public function get_option_tree($key) {
		static $options = null;
		if(null === $options)
			$options = $this->get_option('option_tree');
		if(isset($options[$key])) {
			return $options[$key];
		}
		return null;
	}

	public function get_blog_name() {
		return $this->get_option_tree('blog_name');
	}

	public function get_blog_description() {
		return $this->get_option_tree('blog_description');
	}

	public function get_blog_keywords() {
		return $this->get_option_tree('blog_keywords');
	}

	public function get_facebook_url() {
		return $this->controller->posts_model->get_option('travel[facebook-link]');
	}

	public function get_twitter_url() {
		return $this->controller->posts_model->get_option('travel[twitter-link]');
	}

	public function get_gplus_url() {
		return $this->controller->posts_model->get_option('travel[gplus-link]');
	}

	public function get_contact_url() {
		return $this->controller->posts_model->get_option('travel[con-link]');
	}

	public function get_logo() {
		return $this->get_option_tree('logo');
	}

	public function get_email() {
		return $this->get_option_tree('email');
	}

	public function get_hotline() {
		return $this->get_option_tree('hotline');
	}

	public function get_hotline_2() {
		return $this->get_option_tree('hotline_2');
	}

	public function get_hotline_3() {
		return $this->get_option_tree('hotline_3');
	}

	public function get_instagram() {
		return $this->get_option_tree('instagram');
	}

	public function get_slogan() {
		return $this->get_option_tree('blog_slogan');
	}

	public function get_free_shipping_note() {
		return $this->get_option_tree('free_shipping_note');
	}

	public function get_online_order_note() {
		return $this->get_option_tree('online_order_note');
	}

	public function get_term_taxonomy_image($term_taxonomy_id) {
		return $this->get_option('z_taxonomy_image' . $term_taxonomy_id,0);
	}

	public function get_wpseo_taxonomy_meta() {
		return $this->get_option('wpseo_taxonomy_meta');
	}

	public function get_wpseo_category_field($category, $field) {
		$meta = $this->get_wpseo_taxonomy_meta();
		$meta_category = $meta['category'];
		if(is_numeric($category)) {
			if(isset($meta_category[$category]) && isset($meta_category[$category][$field])) {
				return $meta_category[$category][$field];
			}
		}
		return null;
	}

	// 'wpseo_desc'
	public function get_wpseo_category_description($category) {
		return $this->get_wpseo_category_field($category, 'wpseo_desc');
	}

	public function get_wpseo_category_keywords($category) {
		return $this->get_wpseo_category_field($category, 'wpseo_focuskw');
	}

	public function get_wpseo_category_title($category) {
		return $this->get_wpseo_category_field($category, 'wpseo_bctitle');
	}

}