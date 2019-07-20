<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_TableController {
	public $table_model = 'config_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
	];
}