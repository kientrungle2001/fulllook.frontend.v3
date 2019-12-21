<?php
class Student_order_model extends Abstract_Table_Model
{
	public $table = 'student_order';
	public $metadata = [
		'id' => ['type' => 'int'],
        'classId'	=> ['type' => 'int'],
		'studentId'	=> ['type' => 'int'],
		'orderId'	=> ['type' => 'int'],
		'payment_periodId'	=> ['type' => 'int'],
	];
}
