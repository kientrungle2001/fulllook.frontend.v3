<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_TableController {
	public $table_model = 'payment_model';
	public $filters = [
		'categoryIds' 	=> 	[
			'type' 		=> 	'like'
		],
	];
}