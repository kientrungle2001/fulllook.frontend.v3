<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_TableController {
	public $table_model = 'news_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
	];
}