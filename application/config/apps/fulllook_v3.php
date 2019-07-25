<?php
$config['apps'][] =
	[
		'name' => 'fulllook',
		'host'	=>	'flv3.vn',
		'aliases' => ['tdn.nextnobels.com', 'luyenthitrandainghia.com'],
		'view_packages' => ['fulllook'],
		'css_packages' => ['fulllook'],
		'js_packages' => ['fulllook'],
		'media_packages' => ['fulllook'],
		'devices' => [
			[
				'conds' => function($controller) {
					if($controller->detector->isMobile()) {
						return true;
					}
					return false;
				},
				'result' => [
					'view_packages' => ['mobile', 'safari', 'default'],
					'css_packages' => ['mobile'],
					'js_packages' => ['safari', 'default'],
					'media_packages' => ['safari'],
					'css_libraries' => ['safari'],
					'js_libraries' => ['safari']
				]
			],
			[
				'conds' => function($controller) {
					if($controller->detector->isTablet() || $controller->detector->getDetector()->isSafari() || ($controller->agent->browser() == 'Safari')) {
						return true;
					}
					return false;
				},
				'result' => [
					'view_packages' => ['native', 'safari', 'default'],
					'css_packages' => ['safari'],
					'js_packages' => ['safari', 'default'],
					'media_packages' => ['safari'],
					'css_libraries' => ['safari'],
					'js_libraries' => ['safari']
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
$config['packages'][] = 
	[
		'name' => 'fulllook',
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
						'version' => '4.3.1',
						'file' => 'dist/css/bootstrap.min.css'
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
						'name' => 'MathJax',
						'version' => '2.7.5',
						'files' => ['MathJax.js?config=TeX-AMS-MML_HTMLorMML']
					]
				]
			]
		]
	];