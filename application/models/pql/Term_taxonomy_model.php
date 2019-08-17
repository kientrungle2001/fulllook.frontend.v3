<?php
class Term_taxonomy_model extends Abstract_Table_Model
{
	public $table = 'bv_term_taxonomy';
	public $pkey = 'term_taxonomy_id';

	public function get_one_by_type($term_id, $type = 'category') {
		return $this->get_one_by_conds([
			'term_id' => $term_id,
			'type'	=> $type
		]);
	}
}