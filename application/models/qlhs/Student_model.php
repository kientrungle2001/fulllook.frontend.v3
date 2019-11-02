<?php
class Student_model extends Abstract_Table_Model
{
	public $table = 'student';
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
		'assignId'	=> ['type' => 'int']
	];
}
