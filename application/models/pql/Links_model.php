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

	public function get_product_category_link($language, $category, $category1 = null, $category2 = null, $category3 = null) {
		$language_prefix = '';
		if($language == 'en') {
			$language_prefix = '/en';
		}
		$paths = [];
		$paths[] = wpglobus($category['slug'], $language) . '-cp' . $category['term_id'];
		if($category1) {
			$paths[] = wpglobus($category1['slug'], $language) . '-cp' . $category1['term_id'];
		}
		if($category2) {
			$paths[] = wpglobus($category2['slug'], $language) . '-cp' . $category2['term_id'];
		}
		if($category3) {
			$paths[] = wpglobus($category3['slug'], $language) . '-cp' . $category3['term_id'];
		}
		$paths = array_reverse($paths);
		return $language_prefix . '/' . implode('/', $paths) . '.html';
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
		return $language_prefix . '/' . wpglobus($category['slug'], $language) . '-cn' . $category['term_id'] . '.html';
	}

	public function get_image_url($img) {
		return SITE_PROTOCOL.$_SERVER['HTTP_HOST'].'/_pql/wp-content/uploads/' . $img;
	}

	public function get_language_link($language, $link) {
		if($language == 'en') return '/' . $language . $link;
		return $link;
	}
}
