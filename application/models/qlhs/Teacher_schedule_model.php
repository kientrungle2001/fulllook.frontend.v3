<?php
class Teacher_schedule_model extends Abstract_Table_Model
{
	public $table = 'teacher_schedule';
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
