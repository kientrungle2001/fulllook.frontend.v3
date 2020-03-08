<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller
{
	public function index($language = 'vi')
	{
		$this->load->library('cart');
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if (!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));
		$this->render('cart', $data);
	}
	public function addToCart($language = 'vi')
	{
		$data = array(
			'sku'      => $this->input->post('sku'),
			'qty'     => floatval($this->input->post('quantity')),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'image'    => $this->input->post('image'),
			'link'    => $this->input->post('link'),
			'stock'    => $this->input->post('stock'),
			'brand'    => $this->input->post('brand'),
		);

		$this->cart_insert($data);
		$this->summary();
	}
	public function summary()
	{
		if(!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$rs = [
			'total_items' => count($this->session->cart_items),
			'total' => 0,
			'items' => $this->session->cart_items
		];
		echo json_encode($rs);
	}

	private function cart_insert($data) {
		if(!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$found = false;
		$cart_items = $this->session->cart_items;
		foreach($cart_items as &$item) {
			if($item['sku'] == $data['sku']) {
				$item['qty'] += $data['qty'];
				$found = true;
			}
		}

		if(!$found) {
			$cart_items[] = $data;
		}
		
		$this->session->cart_items = $cart_items;
	}
}
