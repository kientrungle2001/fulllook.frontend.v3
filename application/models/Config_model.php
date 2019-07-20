<?php
class Config_model extends Abstract_Table_Model
{
	public $table = 'config';
	public $metadata = [
		'id' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
		'software' => ['type' => 'int'],
		'ordering' => ['type' => 'int'],
	];

	public function get_value($type, $key) {
		return $this->get_one_field_by_conds([
			'type' => $type,
			'mkey' => $key,
			'status' => 1
		], 'mvalue');
	}

	public function set_value($type, $key, $value) {
		return $this->update_by_conds([
			'type' => $type,
			'mkey' => $key,
			'status' => 1
		], ['mvalue' => $value]);
	}

	public function get_variable($type, $key) {
		$value = $this->get_value($type, $key);
		if($value !== null) {
			return json_decode($value, true);
		}
		return null;
	}

	public function set_variable($type, $key, $value) {
		$this->set_value($type, $key, json_encode($value));
	}
}
