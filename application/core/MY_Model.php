<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

}

class Abstract_Table_Model extends MY_Model
{
	
	public $table;
	public $pkey;
	
	/**
	 * Lấy kết quả query có format theo metadata
	 * @param $result CI_Result
	 * @return array
	 */
	public function result_array($result) {
		$items = $result->result_array();
		foreach($items as &$item) {
			$this->format($item);
		}
		return $items;
	}

	/**
	 * Lấy một bản ghi
	 */
	public function row_array($result) {
		$row = $result->row_array();
		if($row) {
			$this->format($row);
		}
		return $row;
	}

	/**
	 * Lấy tất cả các bản ghi theo điều kiện
	 * @param $conds mixed
	 * @return array
	 */
	public function fetch_all($conds = false) {
		if(false === $conds) {
			return $this->result_array($this->get());
		} else {
			$this->where($conds);
			return $this->result_array($this->get());
		}
	}

	public function get_all($conds = false) {
		return $this->fetch_all($conds);
	}
	
	public function get($start = null, $offset = null) {
		return $this->db->get($this->table, $start, $offset);
	}

	public function select($fields) {
		$this->db->select($fields);
		return $this;
	}

	public function where($field, $value = null) {
		$this->db->where($field, $value);
		return $this;
	}

	public function where_in($field, $value = null) {
		$this->db->where_in($field, $value);
		return $this;
	}

	public function join($table, $where, $type = null) {
		$this->db->join($table, $where, $type);
	}
	
	public function get_one($id, $fields = '*') {
		return $this->row_array($this->db->select($fields)->where($this->pkey, $id)->get($this->table, 0, 1));
	}

	public function get_one_field($id, $field) {
		$row = null;
		if(is_numeric($id)) {
			$row = $this->row_array($this->db->select($field)->where($this->pkey, $id)->get($this->table, 0, 1));
		} else {
			$row = $id;
		}
		
		return $row[$field];
	}

	public function get_one_by_conds($conds, $fields = '*') {
		return $this->row_array($this->db->select($fields)->where($conds)->get($this->table, 0, 1));
	}

	public function get_one_field_by_conds($conds, $field) {
		$row = $this->get_one_by_conds($conds, $field);
		if($row) {
			return $row[$field];
		}
		return null;
	}
	
	public function get_by_ids($ids, $fields = '*') {
		return $this->result_array($this->db->select($fields)->where('id in', $ids)->get($this->table));
	}

	public function insert($values) {
		$this->format_update($values);
		return $this->db->insert($this->table, $values);
	}

	public function update($id, $set) {
		$where = null;
		if(is_numeric($id)) {
			$where = array('id' => $id);
		} else {
			$where = $id;
		}
		
		$this->format_update($set);

		return $this->db->set($set)->where($where)->update($this->table);
	}

	public function update_by_conds($conds, $set) {
		$this->db->update($this->table, $set, $conds);
	}

	public function replace($set) {
		return $this->db->replace($set);
	}

	public function remove($id) {
		return $this->db->where('id', $id)->delete($this->table);
	}

	public function format(&$item) {
		if(isset($this->metadata)) {
			foreach($this->metadata as $field => $settings) {
				if($settings['type'] == 'int') {
					if(isset($item[$field]))
						$item[$field] = intval($item[$field]);
				} elseif($settings['type'] == 'bool') {
					if(isset($item[$field]))
						$item[$field] = boolval(intval($item[$field]));
				} elseif($settings['type'] == 'array') {
					if(isset($item[$field])) {
						$values = explode(',', $item[$field]);
						$item[$field] = [];
						foreach($values as $value) {
							if($value) {
								$item[$field][] = intval($value);
							}
						}
					}
						
				}
			}
		}
	}

	public function format_update(&$item) {
		if(isset($this->metadata)) {
			foreach($this->metadata as $field => $settings) {
				if($settings['type'] == 'int') {
					if(isset($item[$field]))
						$item[$field] = intval($item[$field]);
				} elseif($settings['type'] == 'bool') {
					if(isset($item[$field]))
						$item[$field] = ($item[$field] == 'true' || $item[$field] == 1) ? 1: 0;
				} elseif($settings['type'] == 'array') {
					if(isset($item[$field])) {
						$values = implode(',', $item[$field]);
						if($values != '') {
							$values = ',' . $values . ',';
						}
						$item[$field] = $values;
					}
						
				}
			}
		}
	}
}

class Abstract_Table_Type_Model extends Abstract_Table_Model
{
	public $type;
	public function get($start = null, $offset = null) {
		$this->where('type', $this->type);
		return $this->db->get($this->table, $start, $offset);
	}

	public function insert($values) {
		$values['type'] = $this->type;
		return parent::insert($values);
	}

	public function update($id, $set) {
		$set['type'] = $this->type;
		return parent::update($id, $set);
	}

	public function replace($set) {
		$set['type'] = $this->type;
		return parent::replace($set);
	}

	
}
