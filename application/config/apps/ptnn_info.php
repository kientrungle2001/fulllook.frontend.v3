<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['apps'][] = [
	'name' => 'ptnn',
	'host'	=>	'ptnn.vn',
	'aliases' => ['ptnnv2.vn', 'phattrienngonngu.com'],
	'view_packages' => ['ptnn'],
	'css_packages' => ['ptnn'],
	'js_packages' => ['ptnn'],
	'media_packages' => ['ptnn'],
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
	'name' => 'ptnn',
	'devices' => [
		[
			'name' => 'safari',
			'css_libraries' => [
				[
					'name' => 'bootstrap',
					'version' => '3.3.7',
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
					'version' => '3.3.7',
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
					'version' => '3.3.7',
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
					'version' => '3.3.7',
					'file' => 'js/bootstrap.min.js'
				],
				[
					'name' => 'angularjs',
					'version' => '1.7.8',
					'files' => ['angular.min.js', 'angular-sanitize.min.js']
				]
			]
		]
	]
];