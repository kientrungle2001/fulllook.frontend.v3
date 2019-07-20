<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_TableController {
	public $table_model = 'document_model';
	public $filters = [
		'categoryIds' => ['type' => 'like'],
		'classes' => ['type' => 'like'],
	];
}