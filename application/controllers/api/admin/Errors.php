<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_TableController {
	public $table_model = 'error_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
		'classes' => ['type' => 'like'],
	];
}