<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_TableController {
	public $table_model = 'test_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
		'parents' => ['type' => 'like'],
		'classes' => ['type' => 'like']
	];
}