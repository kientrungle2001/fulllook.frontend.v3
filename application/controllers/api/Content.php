<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MY_Controller {
	public function get_articles() {
		$pageSize = $this->input->get_post('pageSize', true);
		$pageNum = $this->input->get_post('pageNum', true);
		if(!$pageSize) $pageSize = 6;
		if(!$pageNum) $pageNum = 1;
		$startFrom = ($pageNum - 1) * $pageSize;
		$catid = $this->input->get_post('catid', true);
		if($catid) {
			$this->db->where('catid', $catid);
		}
		$this->db->where('state', 1);
		$this->db->select('id,title,catid,introtext');
		$this->db->limit($pageSize, $startFrom);
		$this->db->order_by('featured desc, created_by desc');
		$articles = $this->db->get('tpl_content');
		$articles = $articles->result_array();
		echo json_encode($articles);
	}

	public function article() {
		$article_id = $this->input->get_post('article_id', true);
		if($article_id) {
			$this->db->where('id', $article_id);
		}
		$this->db->where('state', 1);
		$this->db->limit(1);
		$article = $this->db->get('tpl_content');
		$article = $article->row_array();
		echo json_encode($article);
	}
}