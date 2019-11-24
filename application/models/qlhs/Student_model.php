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
		'assignId'	=> ['type' => 'int'],
		'adviceStatus' => ['type' => 'bool'],
		'classed' => ['type' => 'bool'],
		'birthYear' => ['type' => 'int'],
		'grade' => ['type' => 'int'],
		'online' => ['type' => 'bool'],
		'paid' => ['type' => 'bool'],
		'type' => ['type' => 'int'],
		'schoolYear' => ['type' => 'int'],
		'rating' => ['type' => 'int'],
	];
}
