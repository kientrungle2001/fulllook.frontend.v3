<?php
class User_model extends Abstract_Table_Model
{
	public $table = 'user';
	
	public function get_username($id) {
		return $this->get_one_field($id, 'username');
	}
	public function get_link($id) {
		$username = $this->get_one_field($id, 'username');
		return '/'.$username . '.html';
	}
	public function get_formatted_registered($id) {
		$registered = $this->get_one_field($id, 'registered');
		return date('d/m/Y', strtotime($registered));
	}
	public $metadata = [
		'id' => ['type' => 'int'],
		'createdId' => ['type' => 'int'],
		'creatorId' => ['type' => 'int'],
		'modifiedId' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
		'contactStatus' => ['type' => 'bool'],
		'sex' => ['type' => 'bool'],
	];

	
}
