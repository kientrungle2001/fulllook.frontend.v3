<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_student extends MY_TableController {
	public $table_model = 'class_student_model';
	public $indexes = [
		['classes', 'classId', 'className', 'name'],
		['classes', 'classId', 'subjectName', 'subjectName'],
		['classes', 'classId', 'teacherName', 'teacherName'],
		['classes', 'classId', 'teacher2Name', 'teacher2Name'],
		['classes', 'classId', 'roomName', 'roomName'],
		['subject', 'subjectId', 'subjectName', 'name'],
		['student', 'studentId', 'studentName', 'name']
	];
}