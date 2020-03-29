<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function result($language = 'vi'){
		$keyword = $this->input->get('tu_khoa');
		#
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
		$page_title = wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language) ;
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo,
			'keyword' 			=> $keyword
		));
		
		$this->render('search', $data);
	}

	public function product($language = 'vi') {
		$keyword = $this->input->get('ten');
		$category = $this->input->get('danh_muc');
		#
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
		$page_title = wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language) ;
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo,
			'keyword' 			=> $keyword,
			'category'			=> $category
		));
		$this->render('search_product', $data);
	}
}
