<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_TableController {
	public $table_model = 'category_model';
	public $filters = [
		'classes' => ['type' => 'like'],
	];
}