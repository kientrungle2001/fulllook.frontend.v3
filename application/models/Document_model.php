<?php
class Document_model extends Abstract_Table_Model
{
	public $table = 'document';
	public $metadata = [
		'id' => ['type' => 'int'],
		'categoryIds' => ['type' => 'array'],
		'classes' => ['type' => 'array'],
		'createdId' => ['type' => 'int'],
		'creatorId' => ['type' => 'int'],
		'modifiedId' => ['type' => 'int'],
		'ordering' => ['type' => 'int'],
		'software' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
		'hidden' => ['type' => 'bool'],
		'trial' => ['type' => 'bool'],
		'type_id' => ['type' => 'int'],
	];
}
