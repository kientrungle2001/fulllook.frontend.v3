<?php
class Posts_model extends Abstract_Table_Model
{
	public $table = 'bv_posts';
	public $pkey = 'ID';
	public function get_post($id) {
		$one = $this->get_one($id);
		if($one) {
			$rows = [$one];
			$this->load_meta($rows);
			return $rows[0];
		}
		return null;
	}
	public function get_post_thumbnail_img($post) {
		$thumbnail = null;
		if(isset($post['_thumbnail_id']) && $post['_thumbnail_id']) {
			$thumbnail = $this->get_post($post['_thumbnail_id']);
		}
		$img = '';
		if($thumbnail) {
			$img = $thumbnail['_wp_attached_file'];
		}
		return $img;
	}
	public function get_posts($conds, $start = null, $offset = null) {
		$this->select('bv_posts.*, bv_term_relationships.*');
		$this->join('bv_term_relationships', 'bv_term_relationships.object_id = bv_posts.ID');
		$this->where($conds);
		$this->db->order_by('bv_posts.menu_order asc');
		$posts = $this->result_array($this->get($start, $offset));
		if(count($posts))
		$this->load_meta($posts);
		return $posts;
	}
	public function get_nav_items($menu_id) {
		$this->select('bv_posts.*');
		$this->join('bv_term_relationships', 'bv_term_relationships.object_id = bv_posts.ID');
		$this->where('bv_term_relationships.term_taxonomy_id', $menu_id);
		$this->where('bv_posts.post_type', 'nav_menu_item');
		$this->db->order_by('bv_posts.menu_order asc');
		$posts = $this->result_array($this->get());
		if(count($posts))
		$this->load_meta($posts);
		return $posts;
	}
	public function load_meta(&$posts) {
		$post_ids = array();
		foreach($posts as $post) {
			$post_ids[] = $post['ID'];
		}
		$this->db->select('*')->where_in('post_id', $post_ids);
		$result = $this->db->get('bv_postmeta');
		$metas = $result->result_array();
		foreach($posts as &$post) {
			foreach($metas as $meta) {
				if($post['ID'] == $meta['post_id']) {
					$post[$meta['meta_key']] = $meta['meta_value'];
				}
			}
		}
	}
	public function get_customize_changesets() {
		static $rs = null;
		if(null !== $rs) return $rs;
		$this->select('*');
		$this->where('post_type', 'customize_changeset');
		$changesets = $this->result_array($this->get());
		$rs = array();
		foreach($changesets as $changeset):
			$arr = json_decode($changeset['post_content'], true);
			foreach($arr as $key => $val):
				$rs[$key] = $val;
			endforeach;
		endforeach;
		return $rs;
	}

	public function get_option($key) {
		$customize = $this->get_customize_changesets();
		if(isset($customize[$key])) return $customize[$key];
		return null;
	}
}