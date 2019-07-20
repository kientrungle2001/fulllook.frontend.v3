<?php
class Payment_model extends Abstract_Table_Model
{
	public $table = 'history_payment';
	public $metadata = [
		'id' => ['type' => 'int'],
		'createdId' => ['type' => 'int'],
		'creatorId' => ['type' => 'int'],
		'modifiedId' => ['type' => 'int'],
		'software' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
	];
}
