<?php
class Links_model
{
	public function get_product_link($language, $category, $product) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		
		return $language_prefix . '/' . wpglobus($product['post_name'], $language).'-cp' . $category['term_id'] . '-p' . $product['ID'] . '.html';
	}

	public function get_product_link_canonical($language, $product) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		
		return $language_prefix . '/' . wpglobus($product['post_name'], $language) . '-p' . $product['ID'] . '.html';
	}

	public function get_product_category_link($language, $category) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		return $language_prefix . '/' . wpglobus($category['slug'], $language) . '-cp' . $category['term_id'];
	}

	public function get_news_link($language, $category, $news) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		
		return $language_prefix . '/' . wpglobus($news['post_name'], $language). '-cn' . $category['term_id'] . '-n' . $news['ID'] . '.html';
	}

	public function get_news_category_link($language, $category) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		return $language_prefix . '/' . wpglobus($category['slug'], $language) . '-cn' . $category['term_id'];
	}

	public function get_image_url($img) {
		return 'http://'.$_SERVER['HTTP_HOST'].'/_pql/wp-content/uploads/' . $img;
	}

	public function get_language_link($language, $link) {
		if($language == 'en') return '/' . $language . $link;
		return $link;
	}
}