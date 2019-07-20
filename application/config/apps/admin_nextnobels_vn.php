<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['apps'][] = [
	'name' => 'admin',
	'host'	=>	'admin.nextnobels.vn',
	'aliases' => ['adminv2.vn'],
	'view_packages' => ['admin'],
	'css_packages' => ['admin'],
	'js_packages' => ['admin'],
	'media_packages' => ['admin'],
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
	'name' => 'admin',
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
				],
				[
					'name' => 'MathJax',
					'version' => '2.7.5',
					'files' => ['MathJax.js?config=TeX-AMS-MML_HTMLorMML']
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
				[
					'name' => 'select2',
					'version' => 'latest',
					'file' => 'dist/css/select2.min.css'
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

			]
		]
	]
];