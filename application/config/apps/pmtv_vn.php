<?php
$config['apps'][] = [
	'name' => 'pmtv',
	'host'	=>	'pmtv.vn',
	'aliases' => [],
	'view_packages' => ['pmtv'],
	'css_packages' => ['pmtv'],
	'js_packages' => ['pmtv'],
	'media_packages' => ['pmtv'],
	'software_id' => 101,
	'devices' => [
		[
			'conds' => function ($controller) {
				if ($controller->detector->isMobile()) {
					return true;
				}
				return false;
			},
			'result' => [
				'view_packages' => ['mobile', 'safari', 'default'],
				'css_packages' => ['mobile', 'default'],
				'js_packages' => ['safari', 'default'],
				'media_packages' => ['safari', 'default'],
				'css_libraries' => ['safari', 'default'],
				'js_libraries' => ['safari', 'default']
			]
		],
		[
			'conds' => function ($controller) {
				if ($controller->detector->isTablet() || $controller->detector->getDetector()->isSafari() || ($controller->agent->browser() == 'Safari')) {
					return true;
				}
				return false;
			},
			'result' => [
				'view_packages' => ['native', 'safari', 'default'],
				'css_packages' => ['safari', 'default'],
				'js_packages' => ['safari', 'default'],
				'media_packages' => ['safari', 'default'],
				'css_libraries' => ['safari', 'default'],
				'js_libraries' => ['safari', 'default']
			]
		],
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
$config['packages'][] = [
	'name' => 'pmtv',
	'devices' => [
		[
			'name' => 'safari',
			'css_libraries' => [
				[
					'name' => 'bootstrap',
					'version' => '5.3.8',
					'file' => 'css/bootstrap.min.css'
					//'file' => 'scss/css/bootstrap.css?_=' . time()
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
					'version' => '3.3.1',
					'file' => 'jquery.min.js'
				],
				[
					'name' => 'popper',
					'version' => '2.11.8',
					'file' => 'popper.min.js'
				],
				[
					'name' => 'bootstrap',
					'version' => '5.3.8',
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
					'version' => '5.3.8',
					'file' => 'css/bootstrap.min.css'
					//'file' => 'scss/css/bootstrap.css?_=' . time()
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
					'version' => '3.3.1',
					'file' => 'jquery.min.js'
				],
				[
					'name' => 'popper',
					'version' => '2.11.8',
					'file' => 'popper.min.js'
				],
				[
					'name' => 'bootstrap',
					'version' => '5.3.8',
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
		]
	]
];
