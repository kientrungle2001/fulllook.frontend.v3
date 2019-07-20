<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_TableController {
	
	public $table_model = 'question_model';

	public $filters = [
		'categoryIds' => ['type' => 'like'],
		'testId' => ['type' => 'like'],
		'classes' => ['type' => 'like'],
		'teacherIds' => ['type' => 'like']
	];
}