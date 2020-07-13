<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['apps'][] = [
	'name' => 'crawler',
	'host'	=>	'crawler.com',
	'aliases' => ['crawler.vn'],
	'view_packages' => ['crawler'],
	'css_packages' => ['crawler'],
	'js_packages' => ['crawler'],
	'media_packages' => ['crawler'],
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
	'name' => 'crawler',
	'devices' => [
		[
			'name' => 'safari',
			'css_libraries' => [
				[
					'name' => 'bootstrap',
					'version' => '4.3.1',
					'file' => 'css/bootstrap.min.css'
				],
				[
					'name' => 'font-awesome',
					'version' => '4.7.0',
					'file' => 'css/font-awesome.min.css'
				]
			],
			'js_libraries' => [
				[
					'name' => 'jquery',
					'version' => '1.12.4',
					'file' => 'jquery.min.js'
				],
				[
					'name' => 'bootstrap',
					'version' => '4.3.1',
					'file' => 'js/bootstrap.min.js'
				],
				[
					'name' => 'angularjs',
					'version' => '1.7.8',
					'files' => ['angular.min.js', 'angular-sanitize.min.js']
				]
			]
		],
		[
			'name' => 'default',
			'css_libraries' => [
				[
					'name' => 'bootstrap',
					'version' => '4.3.1',
					'file' => 'scss/css/bootstrap.css'
				],
				[
					'name' => 'font-awesome',
					'version' => '4.7.0',
					'file' => 'css/font-awesome.min.css'
				],
				/*
				[
					'name' => 'select2',
					'version' => 'latest',
					'file' => 'dist/css/select2.min.css'
				]
				*/
			],
			'js_libraries' => [
				[
					'name' => 'jquery',
					'version' => '1.12.4',
					'file' => 'jquery.min.js'
				],
				[
					'name' => 'bootstrap',
					'version' => '4.3.1',
					'file' => 'dist/js/bootstrap.min.js'
				],
				[
					'name' => 'angularjs',
					'version' => '1.7.8',
					'files' => ['angular.min.js', 'angular-sanitize.min.js']
				],
				[
					'name' => 'ui-bootstrap',
					'version' => '2.5.0',
					'files' => ['ui-bootstrap-tpls-2.5.0.min.js']
				],
				/*
				[
					'name' => 'tinymce',
					'version' => '5.0.4',
					'files' => ['js/tinymce/tinymce.min.js']
				],
				[
					'name' => 'ui-tinymce',
					'version' => 'latest',
					'files' => ['dist/tinymce.min.js']
				],
				[
					'name' => 'select2',
					'version' => 'latest',
					'files' => ['dist/js/select2.min.js']
				],
				[
					'name' => 'ui-select2',
					'version' => 'latest',
					'files' => ['src/select2.js']
				]
				*/
			]
		]
	]
];
