<?php
class Class_student_model extends Abstract_Table_Model
{
	public $table = 'class_student';
	public $metadata = [
		'id' => ['type' => 'int'],
		'status' => ['type' => 'bool'],
        'classId'	=> ['type' => 'int'],
		'studentId'	=> ['type' => 'int'],
		'roomId'	=> ['type' => 'int'],
		'subjectId'	=> ['type' => 'int'],
		'teacherId'	=> ['type' => 'int'],
		'teacher2Id'=> ['type' => 'int'],
	];
}
