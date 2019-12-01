<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
    public function index($language = 'vi') {
        $this->load->library('cart');
        $data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if(!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language) ;
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));
        $this->render('cart', $data);
    }
    public function addToCart() {
        $this->load->library('cart');
        $data = array(
            'id'      => $this->input->post('sku'),
            'qty'     => $this->input->post('quantity'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name')
        );
    
        $this->cart->insert($data);
    }
}