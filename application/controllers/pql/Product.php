<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{

	public function index($language = 'vi')
	{
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$this->render('product/index', $data);
	}

	public function category($language = 'vi', $catId = null, $catId1 = null, $catId2 = null, $catId3 = null)
	{
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name_short();
		$logo = replace_host($this->options_model->get_logo());
		# load category
		$category = $this->terms_model->get_one($catId);
		$category_taxonomy = $this->terms_model->get_term_taxonomy($catId);

		# categories
		$categories = [$category];
		if ($catId1) {
			$category1 = $this->terms_model->get_one($catId1);
			$categories[] = $category1;
		}

		if ($catId2) {
			$category2 = $this->terms_model->get_one($catId2);
			$categories[] = $category2;
		}

		if ($catId3) {
			$category3 = $this->terms_model->get_one($catId3);
			$categories[] = $category3;
		}

		$categories = array_reverse($categories);

		#
		$page_title = wpglobus($category['name'], $language) . ' | ' . wpglobus($blogname, $language);

		#
		$page_keywords = $this->options_model->get_wpseo_category_keywords($catId);

		if (!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords(), $language);
		}

		#
		$page_description = wpglobus($this->options_model->get_wpseo_category_description($catId), $language);
		if (!$page_description) {
			$page_description = html_escape(strip_tags(wpglobus($category_taxonomy['description'], $language)));
		}

		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}

		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_slogan(), $language);
		}

		#
		$page_image = replace_host($this->options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']));
		if (!$page_image) {
			$page_image = $logo;
		}

		#
		$data = array_merge($data, array('language' => $language, 'catId' => $catId), array(
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $page_image,
			'product_categories' => $categories
		));
		$this->render('product/category', $data);
	}

	public function category_slug($language = 'vi', $catSlug = null, $catSlug1 = null, $catSlug2 = null, $catSlug3 = null)
	{
		$data = array();
		$this->load_pql_models($data);
		#
		$cat = $this->terms_model->get_by_slug($catSlug);
		$catId = $cat['term_id'];
		#
		$catId1 = null;
		if ($catSlug1) {
			$cat1 = $this->terms_model->get_by_slug($catSlug1);
			$catId1 = $cat1['term_id'];
		}
		#
		$catId2 = null;
		if ($catSlug2) {
			$cat2 = $this->terms_model->get_by_slug($catSlug2);
			$catId2 = $cat2['term_id'];
		}
		#
		$catId3 = null;
		if ($catSlug3) {
			$cat3 = $this->terms_model->get_by_slug($catSlug3);
			$catId3 = $cat3['term_id'];
		}
		#
		$blogname = $this->options_model->get_blog_name_short();
		$logo = replace_host($this->options_model->get_logo());
		# load category
		$category = $this->terms_model->get_one($catId);
		$category_taxonomy = $this->terms_model->get_term_taxonomy($catId);

		# categories
		$categories = [$category];
		if ($catId1) {
			$category1 = $this->terms_model->get_one($catId1);
			$categories[] = $category1;
		}

		if ($catId2) {
			$category2 = $this->terms_model->get_one($catId2);
			$categories[] = $category2;
		}

		if ($catId3) {
			$category3 = $this->terms_model->get_one($catId3);
			$categories[] = $category3;
		}

		$categories = array_reverse($categories);

		#
		$page_title = wpglobus($category['name'], $language) . ' | ' . wpglobus($blogname, $language);

		#
		$page_keywords = $this->options_model->get_wpseo_category_keywords($catId);

		if (!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords(), $language);
		}

		#
		$page_description = wpglobus($this->options_model->get_wpseo_category_description($catId), $language);
		if (!$page_description) {
			$page_description = html_escape(strip_tags(wpglobus($category_taxonomy['description'], $language)));
		}

		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}

		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_slogan(), $language);
		}

		#
		$page_image = replace_host($this->options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']));
		if (!$page_image) {
			$page_image = $logo;
		}

		#
		$data = array_merge($data, array('language' => $language, 'catId' => $catId), array(
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $page_image,
			'product_categories' => $categories
		));
		$this->render('product/category', $data);
	}

	public function feed($language = 'vi', $catId = null)
	{
		$data = array('language' => $language, 'catId' => $catId);
		$this->load_pql_models($data);
		header("Content-type: text/xml");
		$this->view('product/feed', $data);
	}

	public function detail($language = 'vi', $catId = null, $productId = null, $catId1 = null, $catId2 = null, $catId3 = null)
	{
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name_short();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();

		# load product
		$product = $this->posts_model->get_post($productId);

		#
		//pre($product);


		/**
		 * title, description, keywords, image
		 */
		#
		$page_title = wpglobus($product['post_title'], $language) . ' | ' . wpglobus($blogname, $language);

		#
		$page_keywords = null;
		if (isset($product['_yoast_wpseo_focuskw'])) {
			$page_keywords = wpglobus($product['_yoast_wpseo_focuskw'], $language);
		}
		if (!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords());
		}
		#
		$page_description = null;
		if (isset($product['_yoast_wpseo_metadesc'])) {
			$page_description = wpglobus($product['_yoast_wpseo_metadesc'], $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($product['post_excerpt'], $language);
		}
		if (!$page_description) {
			$page_description = wpglobus(html_escape(strip_tags($product['post_content'])), $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($slogan, $language);
		}
		#
		$page_image = $this->posts_model->get_post_thumbnail_img($product);
		if ($page_image) {
			$page_image = replace_host($this->links_model->get_image_url($page_image));
		}
		if (!$page_image) {
			$page_image = replace_host($logo);
		}

		#catIds
		$catIds = [];
		if ($catId1) $catIds[] = $catId1;
		if ($catId2) $catIds[] = $catId2;
		if ($catId3) $catIds[] = $catId3;
		$catIds[] = $catId;
		#
		$data = array_merge(
			$data,
			array('language' => $language, 'catId' => $catId, 'productId' => $productId),
			array('catIds' => $catIds),
			array(
				'page_title' 		=> $page_title,
				'page_description' 	=> $page_description,
				'page_keywords' 	=> $page_keywords,
				'page_image' 		=> $page_image
			)
		);
		$this->render('product/detail', $data);
	}

	public function detail_slug($language = 'vi', $catSlug = null, $productId = null, $catSlug1 = null, $catSlug2 = null, $catSlug3 = null)
	{
		$data = array();
		$this->load_pql_models($data);
		#
		$cat = $this->terms_model->get_by_slug($catSlug);
		$catId = $cat['term_id'];
		#
		$catId1 = null;
		if ($catSlug1) {
			$cat1 = $this->terms_model->get_by_slug($catSlug1);
			$catId1 = $cat1['term_id'];
		}
		#
		$catId2 = null;
		if ($catSlug2) {
			$cat2 = $this->terms_model->get_by_slug($catSlug2);
			$catId2 = $cat2['term_id'];
		}
		#
		$catId3 = null;
		if ($catSlug3) {
			$cat3 = $this->terms_model->get_by_slug($catSlug3);
			$catId3 = $cat3['term_id'];
		}
		#
		$blogname = $this->options_model->get_blog_name_short();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();

		# load product
		$product = $this->posts_model->get_post($productId);

		#
		//pre($product);


		/**
		 * title, description, keywords, image
		 */
		#
		$page_title = wpglobus($product['post_title'], $language) . ' | ' . wpglobus($blogname, $language);

		#
		$page_keywords = null;
		if (isset($product['_yoast_wpseo_focuskw'])) {
			$page_keywords = wpglobus($product['_yoast_wpseo_focuskw'], $language);
		}
		if (!$page_keywords) {
			$page_keywords = wpglobus($this->options_model->get_blog_keywords());
		}
		#
		$page_description = null;
		if (isset($product['_yoast_wpseo_metadesc'])) {
			$page_description = wpglobus($product['_yoast_wpseo_metadesc'], $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($product['post_excerpt'], $language);
		}
		if (!$page_description) {
			$page_description = wpglobus(html_escape(strip_tags($product['post_content'])), $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($this->options_model->get_blog_description(), $language);
		}
		if (!$page_description) {
			$page_description = wpglobus($slogan, $language);
		}
		#
		$page_image = $this->posts_model->get_post_thumbnail_img($product);
		if ($page_image) {
			$page_image = replace_host($this->links_model->get_image_url($page_image));
		}
		if (!$page_image) {
			$page_image = replace_host($logo);
		}

		#catIds
		$catIds = [];
		if ($catId1) $catIds[] = $catId1;
		if ($catId2) $catIds[] = $catId2;
		if ($catId3) $catIds[] = $catId3;
		$catIds[] = $catId;
		#
		$data = array_merge(
			$data,
			array('language' => $language, 'catId' => $catId, 'productId' => $productId),
			array('catIds' => $catIds),
			array(
				'page_title' 		=> $page_title,
				'page_description' 	=> $page_description,
				'page_keywords' 	=> $page_keywords,
				'page_image' 		=> $page_image
			)
		);
		$this->render('product/detail', $data);
	}
}
