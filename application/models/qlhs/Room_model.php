<?php
class Room_model extends Abstract_Table_Model
{
	public $table = 'room';
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
