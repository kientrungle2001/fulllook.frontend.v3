<?php
class Terms_model extends Abstract_Table_Model
{
	public $table = 'bv_terms';
	public $pkey = 'term_id';
	public $metadata = [
		'id' => ['type' => 'int'],
		'status' => ['type' => 'int'],
	];

	public function get_roots() {
		return $this->get_children(0);
	}

	public function get_term_taxonomies($conds) {
		$query = $this->select('bv_terms.*, bv_term_taxonomy.term_taxonomy_id, bv_term_taxonomy.parent');
		$this->join('bv_term_taxonomy', 'bv_terms.term_id=bv_term_taxonomy.term_id');
		$this->where($conds);
		$children = $this->result_array($query->get());
		return $children;
	}

	public function prepare_term_taxonomies() {
		$this->select('bv_terms.*, bv_term_taxonomy.term_taxonomy_id, bv_term_taxonomy.parent');
		$this->join('bv_term_taxonomy', 'bv_terms.term_id=bv_term_taxonomy.term_id');
		return $this;
	}

	/**
	 * Lấy danh sách các category con của một category
	 * @param int $parent parent term id
	 * @return array danh sách các category term con
	 */
	public function get_children($parent = 0) {
		$query = $this->select('bv_terms.*, bv_term_taxonomy.term_taxonomy_id, bv_term_taxonomy.parent');
		$this->join('bv_term_taxonomy', 'bv_terms.term_id=bv_term_taxonomy.term_id');
		$this->where('bv_term_taxonomy.taxonomy', 'category');
		$this->where('parent', $parent);
		$children = $this->result_array($query->get());
		return $children;
	}

	/**
	 * Lấy danh sách menu
	 * @return array danh sách nav_menu
	 */
	public function get_nav_menus() {
		$query = $this->select('bv_terms.*, bv_term_taxonomy.term_taxonomy_id, bv_term_taxonomy.parent');
		$this->join('bv_term_taxonomy', 'bv_terms.term_id=bv_term_taxonomy.term_id');
		$this->where('bv_term_taxonomy.taxonomy', 'nav_menu');
		$children = $this->result_array($query->get());
		return $children;
	}

	/**
	 * Lấy term_taxonomy từ term và loại taxanomy
	 * @param int $term_id term id
	 * @param string $taxonomy loại taxonomy
	 * @return array bản ghi term_taxonomy 
	 */
	public function get_term_taxonomy($term_id, $taxonomy = 'category') {
		$this->db->select('*')->where('term_id', $term_id)->where('taxonomy', $taxonomy);
		$result = $this->db->get('bv_term_taxonomy', 0, 1);
		$row = $result->row_array();
		return $row;
	}
	
	/**
	 * Lấy term từ slug
	 * @param string $slug slug của term
	 * @return array term
	 * 
	 */
	public function get_by_slug($slug) {
		return $this->get_one_by_conds([
			'slug' => $slug
		]);
	}
}
