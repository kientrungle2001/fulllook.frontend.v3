<?php
class MY_TableController extends MY_Controller {
    public $table_model;
	
	public function items($table = null, $pageSize = null, $pageNum = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		if(!$pageSize) {
			$pageSize = $this->input->get_post('pageSize', true);
		}
		if(!$pageNum) {
			$pageNum = $this->input->get_post('pageNum', true);
		}
		$select = $this->input->get_post('select', true);
		if(!$select) {
			$select = $this->input->get_post('fields', true);
		}
		$sort = $this->input->get_post('sort', true);
		
		if(!$table) {
			$table = $this->input->get_post('table', true);
		}
		
		$joins = $this->input->get_post('joins', true);
		
		$where = $this->input->get_post('where', true);

		$keyword = $this->input->get_post('keyword', true);
		$keyword_escape = $this->db->escape('%'.$keyword.'%');
		$where_keyword = null;
		if($keyword) {
			$search_fields = $this->input->get_post('search_fields', true);
			$keyword_conds = [];
			foreach($search_fields as $field) {
				$keyword_conds[] = "`$field` like $keyword_escape";
			}
			$where_keyword = '('. implode(' or ', $keyword_conds) . ')';
		}
		
		if(!$pageSize) $pageSize = 10;
		if(!$pageNum) $pageNum = 0;
		$startFrom = $pageNum * $pageSize;
		
		if($select) {
			$table_model->select($select);
		}
		
		if($joins) {
			foreach($joins as $join) {
				$table_model->join($join[0], $join[1], isset($join[2]) ? $join[2] : 'inner');
			}
		}

		if($where_keyword) {
			$table_model->where($where_keyword);
		}

		# filters
		if($where) {
			foreach ($where as $key => $value) {
				if(is_array($value)) {

					if(count($value)) {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$conds = [];
								foreach($value as $v) {
									$conds[] = ($cond = '(' . $key. " like '%,$v,%'" . ' or ' . $key. " like '%[$v]%'" . ')');
								}
								$table_model->db->where(implode(' or ', $conds));
							}
						} else {
							#has not filters
							$table_model->db->where_in($key, $value);
						}
					}
				} else {
					if($value !== '') {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$table_model->db->like($key, ','.$value.',');	
							}
							if($this->filters[$key]['type'] == 'like_raw') {
								$table_model->db->like($key, $value);
							}
						} else {
							# has not filters
							$table_model->db->where($key, $value);
						}
					}
				}
			}
		}
		
		# pagination
		$table_model->db->limit($pageSize, $startFrom);
		
		# sort
		$table_model->db->order_by($sort);
		$items = $table_model->db->get($table);
		$items = $table_model->result_array($items);

		# count
		if($select) {
			$this->db->select($select);
		}
		
		# join
		if($joins) {
			foreach($joins as $join) {
				$this->db->join($join[0], $join[1], isset($join[2]) ? $join[2] : 'inner');
			}
		}
		
		if($where_keyword) {
			$table_model->where($where_keyword);
		}

		# filters
		if($where) {
			foreach ($where as $key => $value) {
				if(is_array($value)) {

					if(count($value)) {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$conds = [];
								foreach($value as $v) {
									$conds[] = $key. " like '%,$v,%'";
								}
								$this->db->where(implode(' or ', $conds));
							}
						} else {
							#has not filters
							$this->db->where_in($key, $value);
						}
					}
				} else {
					if($value !== '') {
						# has filters
						if(isset($this->filters) && isset($this->filters[$key])) {
							if($this->filters[$key]['type'] == 'like') {
								$this->db->like($key, ','.$value.',');	
							}
							if($this->filters[$key]['type'] == 'like_raw') {
								if(@$_REQUEST['showDebug'])
									echo $key . $value;
								$table_model->db->like($key, $value);
							}
						} else {
							# has not filters
							$this->db->where($key, $value);
						}
					}
				}
			}
		}

		$count_items = $this->db->count_all_results($table);
		foreach($items as &$item) {
			$this->format($item);
		}
		$result = [
			'rows' => $items,
			'total' => $count_items
		];
		echo json_encode($result);
	}

	public function item($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $table_model->get_one($id);
		echo json_encode($item);
	}

	public function update($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $this->input->post('item');
		$table_model->update($id, $item);
		if(isset($this->indexes)) {
			// $joinTable, $referenceId, $referenceField, $referenceValue
			foreach($this->indexes as $index) {
				$table_model->reindex($index[0], $index[1], $index[2], $index[3], [$id]);
			}
		}
		$item = $table_model->get_one($id);
		echo json_encode($item);
	}

	public function update_all($table = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $this->input->post('item');
		$where = $this->input->post('where');
		$rows = $table_model->select('id')->get_all($where);
		$table_model->update($where, $item);
		$ids = [];
		foreach($rows as $row) {
			$ids[] = $row['id'];
		}
		if(isset($this->indexes)) {
			// $joinTable, $referenceId, $referenceField, $referenceValue
			foreach($this->indexes as $index) {
				$table_model->reindex($index[0], $index[1], $index[2], $index[3], $ids);
			}
		}
		echo 1;
	}

	public function remove($table = null, $id = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$table_model->remove($id);
		echo $id;
	}

	public function remove_all($table = null) {

	}
	public function insert($table = null) {
		$this->load->model($this->table_model);
		$table_model = $this->{$this->table_model};
		$item = $this->input->post('item');
		$table_model->insert($item);
		$id = $table_model->db->insert_id();
		if(isset($this->indexes)) {
			// $joinTable, $referenceId, $referenceField, $referenceValue
			foreach($this->indexes as $index) {
				$table_model->reindex($index[0], $index[1], $index[2], $index[3], [$id]);
			}
		}
		$item = $table_model->get_one($id);
		echo json_encode($item);
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
}