<?php
class Admin_model extends Abstract_Table_Model
{
	public $table = 'admin';
	public $metadata = [
		'id' => ['type' => 'int'],
		'status' => ['type' => 'int'],
	];
}
