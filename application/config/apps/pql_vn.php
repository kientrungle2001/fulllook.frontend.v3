<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['apps'][] = [
	'name' => 'pql',
	'host'	=>	'pql.vn',
	'aliases' => ['pql.com', 'pql.nn-center.com', 'mobo.com.vn', 'www.mobo.com.vn'],
	'view_packages' => ['default'],
	'css_packages' => ['default'],
	'js_packages' => ['default'],
	'media_packages' => ['default'],
	'devices' => [
		[
			'conds' => false,
			'result' => [
				'view_packages' => ['default'],
				'css_packages' => ['default'],
				'js_packages' => ['default'],
				'media_packages' => ['default'],
				'css_libraries' => ['default'],
				'js_libraries' => ['default']
			]
		]
	]
];

$config['packages'][] = 	[
	'name' => 'pql',
	'devices' => [
		[
			'name' => 'default',
			'css_libraries' => [
				[
					'name' => 'font-awesome',
					'version' => '4.7.0',
					'file' => 'css/font-awesome.min.css'
				],
			],
			'js_libraries' => [
				[
					'name' => 'jquery',
					'version' => '1.12.4',
					'file' => 'jquery.min.js'
				]
			]
		]
	]
];