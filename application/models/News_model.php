<?php
class News_model extends Abstract_Table_Model
{
	public $table = 'news';
	public $metadata = [
		'id' => ['type' => 'int'],
		'categoryIds' => ['type' => 'array'],
		'categoryId' => ['type' => 'int'],
		'createdId' => ['type' => 'int'],
		'creatorId' => ['type' => 'int'],
		'global' => ['type' => 'bool'],
		'modifiedId' => ['type' => 'int'],
		'ordering' => ['type' => 'int'],
		'software' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
	];
}
