<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	public function index($language = 'vi'){
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$this->render('news/index', $data);
	}

	public function category($language = 'vi', $catId = null){
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name();
		$logo = replace_host($this->options_model->get_logo());
		# load category
		$category = $this->terms_model->get_one($catId);
		$category_taxonomy = $this->terms_model->get_term_taxonomy($catId);

		#
		$page_title = wpglobus($category['name'], $language) . ' | ' . wpglobus($blogname, $language);

		#
		$page_keywords = $this->options_model->get_wpseo_category_keywords($catId);

		if(!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords(), $language);
		}

		#
		$page_description = wpglobus($this->options_model->get_wpseo_category_description($catId), $language);
		if(!$page_description) {
			$page_description = html_escape(strip_tags(wpglobus($category_taxonomy['description'], $language)));
		}

		if(!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}

		if(!$page_description) {
			$page_description = wpglobus($this->options_model->get_slogan(), $language);
		}

		#
		$page_image = replace_host($this->options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']));
		if(!$page_image) {
			$page_image = $logo;
		}

		#
		$data = array_merge($data, array('language' => $language, 'catId' => $catId), array(
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $page_image
		)) ;

		$this->render('news/category', $data);
	}

	public function detail($language = 'vi', $catId = null, $newsId = null){
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();

		# load news
		$news = $this->posts_model->get_post($newsId);
		
		#
		//pre($news);
		

		/**
		 * title, description, keywords, image
		 */
		#
		$page_title = wpglobus($news['post_title'], $language) . ' | ' . wpglobus($blogname, $language);
		
		#
		$page_keywords = null;
		if(isset($news['_yoast_wpseo_focuskw'])) {
			$page_keywords = wpglobus($news['_yoast_wpseo_focuskw'], $language);
		}
		if(!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords());
		}
		#
		$page_description = null;
		if(isset($news['_yoast_wpseo_metadesc'])) {
			$page_description = wpglobus($news['_yoast_wpseo_metadesc'], $language);
		}
		if(!$page_description) {
			$page_description = wpglobus($news['post_excerpt'], $language);
		}
		if(!$page_description) {
			$page_description = wpglobus(html_escape(strip_tags($news['post_content'])), $language);
		}
		if(!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}
		if(!$page_description) {
			$page_description = wpglobus($slogan, $language);
		}
		#
		$page_image = $this->posts_model->get_post_thumbnail_img($news);
		if($page_image) {
			$page_image = replace_host($this->links_model->get_image_url($page_image));
		}
		if(!$page_image) {
			$page_image = replace_host($logo);
		}
		 
		#
		$data = array_merge($data,
			array('language' => $language, 'catId' => $catId, 'newsId' => $newsId),
			array(
				'page_title' 		=> $page_title,
				'page_description' 	=> $page_description,
				'page_keywords' 	=> $page_keywords,
				'page_image' 		=> $page_image
			)
		);
		$this->render('news/detail', $data);
	}

	public function feed($language = 'vi', $catId = null){
		$data = array('language' => $language, 'catId' => $catId);
		$this->load_pql_models($data);
		header("Content-type: text/xml");
		$this->view('news/feed', $data);
	}
}