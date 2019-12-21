<?php
class Classes_model extends Abstract_Table_Model
{
	public $table = 'classes';
	public $metadata = [
		'id' => ['type' => 'int'],
		'parent' => ['type' => 'int'],
		'trial' => ['type' => 'bool'],
		'status' => ['type' => 'bool'],
		'ordering' => ['type' => 'int'],
		'classes' => ['type' => 'array'],
		'level' => ['type' => 'int'],
		'documentLevel' => ['type' => 'int'],
		'document' => ['type' => 'bool'],
		'display' => ['type' => 'bool'],
		'online' => ['type' => 'int'],
		'classed' => ['type' => 'bool'],
		'roomId' => ['type' => 'int'],
		'subjectId' => ['type' => 'int'],
		'teacherId' => ['type' => 'int'],
	];
}
