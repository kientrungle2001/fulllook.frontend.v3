<?php
class Advice_model extends Abstract_Table_Model
{
	public $table = 'advice';
	public $metadata = [
		'id' => ['type' => 'int'],
		'status' => ['type' => 'int'],
        'classId'	=> ['type' => 'int'],
		'studentId'	=> ['type' => 'int'],
		'roomId'	=> ['type' => 'int'],
		'subjectId'	=> ['type' => 'int'],
		'teacherId'	=> ['type' => 'int'],
		'teacher2Id'=> ['type' => 'int'],
	];
}
