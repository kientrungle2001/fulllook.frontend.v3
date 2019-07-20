<?php
class Options_model extends Abstract_Table_Model
{
	public $table = 'bv_options';
	public function get_option($key, $type = 1) {
		$this->select('*');
		$this->where('option_name', $key);
		$rs = $this->get(0, 1);
		$row = $this->row_array($rs);
		if($type == 0) {
			return $row['option_value'];
		} elseif($type == 1) {
			return unserialize($row['option_value']);
		} elseif($type == 2) {
			return json_decode($row['option_value'], true);
		}
		return $row['option_value'];
	}

	public function get_option_tree($key) {
		static $options = null;
		if(null === $options)
			$options = $this->get_option('option_tree');
		if(isset($options[$key])) {
			return $options[$key];
		}
		return null;
	}
}