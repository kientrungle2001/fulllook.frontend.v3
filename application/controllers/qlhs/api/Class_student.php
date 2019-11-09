<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_student extends MY_TableController {
	public $table_model = 'class_student_model';
	public function reindex() {
		$this->classes_model->reindex('subject', 'subjectId', 'subjectName', 'name');
		$this->classes_model->reindex('teacher', 'teacherId', 'teacherName', 'name');
		$this->classes_model->reindex('teacher', 'teacher2Id', 'teacher2Name', 'name');
		$this->classes_model->reindex('room', 'roomId', 'roomName', 'name');
		echo 'Index Classes Done<br />';
		
		$this->class_student_model->reindex('classes', 'classId', 'className', 'name');
		$this->class_student_model->reindex('classes', 'classId', 'subjectName', 'subjectName');
		$this->class_student_model->reindex('classes', 'classId', 'teacherName', 'teacherName');
		$this->class_student_model->reindex('classes', 'classId', 'teacher2Name', 'teacher2Name');
		$this->class_student_model->reindex('classes', 'classId', 'roomName', 'roomName');
		$this->class_student_model->reindex('subject', 'subjectId', 'subjectName', 'name');
		$this->class_student_model->reindex('student', 'studentId', 'studentName', 'name');
		echo 'Index Class Student Done<br />';

		$this->student_model->reindex('teacher', 'assignId', 'assignName', 'name');
		echo 'Index Student Done<br />';

		$this->advice_model->reindex('classes', 'classId', 'subjectId', 'subjectId');
		$this->advice_model->reindex('classes', 'classId', 'className', 'name');
		$this->advice_model->reindex('teacher', 'adviceId', 'adviceName', 'name');
		$this->advice_model->reindex('subject', 'subjectId', 'subjectName', 'name');
		$this->advice_model->reindex('student', 'studentId', 'studentName', 'name');
		echo 'Index Advice Done<br />';

		$this->student_schedule_model->reindex('classes', 'classId', 'className', 'name');
		$this->student_schedule_model->reindex('student', 'studentId', 'studentName', 'name');
		echo 'Index Student Schedule Done<br />';

		$this->student_order_model->reindex('classes', 'classId', 'className', 'name');
		$this->student_order_model->reindex('classes', 'classId', 'subjectId', 'subjectId');
		$this->student_order_model->reindex('subject', 'subjectId', 'subjectName', 'name');
		$this->student_order_model->reindex('student', 'studentId', 'studentName', 'name');
		$this->student_order_model->reindex('payment_period', 'payment_periodId', 'payment_periodName', 'name');
		echo 'Index Student Order Done<br />';
	}
}