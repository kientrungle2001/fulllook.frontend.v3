<?php
class student_schedule_model extends Abstract_Table_Model
{
	public $table = 'student_schedule';
	public $metadata = [
		'id' => ['type' => 'int'],
        'classId'	=> ['type' => 'int'],
		'studentId'	=> ['type' => 'int'],
	];
}
