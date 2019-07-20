<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_TableController {
	public $table_model = 'user_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
	];
}