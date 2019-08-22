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
		$page_title = 'Trang chủ | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		# load category
		$category = $this->terms_model->get_one($catId);
		$category_taxonomy = $this->terms_model->get_term_taxonomy($catId);
		$page_title = wpglobus($category['name'], $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = $category_taxonomy['description'] ? wpglobus($category_taxonomy['description'], $language) : $page_description;
		#
		$yo = $this->options_model->get_option('wpseo_taxonomy_meta');
		if(isset($yo['category'][$category_taxonomy['term_taxonomy_id']])) {
			$page_keywords = ($yo['category'][$category_taxonomy['term_taxonomy_id']]['wpseo_focuskw']);
		}
		#
		$data = array_merge($data, array('language' => $language, 'catId' => $catId), array(
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
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
		#
		$description = $this->options_model->get_blog_description();
		if(!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = 'Trang chủ | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		# load category
		$category = $this->terms_model->get_one($catId);
		$category_taxonomy = $this->terms_model->get_term_taxonomy($catId);
		$page_title = wpglobus($category['name'], $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = $category_taxonomy['description'] ? wpglobus($category_taxonomy['description'], $language) : $page_description;
		# load news
		$news = $this->posts_model->get_post($newsId);
		$page_title = wpglobus($news['post_title'], $language) . ' | ' . wpglobus($blogname, $language);
		#
		$page_description = $news['post_excerpt'] ? wpglobus($news['post_excerpt'], $language) : $page_description;
		#
		$img = $this->posts_model->get_post_thumbnail_img($news);
		if($img) {
			$logo = $this->links_model->get_image_url($img);
		}
		#
		//pre($news);
		if(isset($news['_yoast_wpseo_focuskw'])) {
			$page_keywords = wpglobus($news['_yoast_wpseo_focuskw'], $language);
		}
		#
		$data = array_merge($data,
			array('language' => $language, 'catId' => $catId, 'newsId' => $newsId),
			array(
				'page_title' 		=> $page_title,
				'page_description' 	=> $page_description,
				'page_keywords' 	=> $page_keywords,
				'page_image' 		=> $logo
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