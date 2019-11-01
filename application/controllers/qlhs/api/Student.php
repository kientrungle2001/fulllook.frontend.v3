<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_TableController {
	public $table_model = 'student_model';
	public $filters = [
		'currentClassIds' => [
			'type' => 'like_raw'
		]
	];
}