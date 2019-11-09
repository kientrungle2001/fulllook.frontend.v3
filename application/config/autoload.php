<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('user_agent', 'session', 'detector');
if($_SERVER['HTTP_HOST'] == 'phattrienngonngu.com' || $_SERVER['HTTP_HOST'] == 'admin.nextnobels.vn' || $_SERVER['HTTP_HOST'] == 'pql.vn' || $_SERVER['HTTP_HOST'] == 'pql.nn-center.com' || $_SERVER['HTTP_HOST'] == 'www.mobo.com.vn' || $_SERVER['HTTP_HOST'] == 'mobo.com.vn' || $_SERVER['HTTP_HOST'] == 'admin.qlhs.vn') {
	$autoload['libraries'][] = 'database';
}

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array('cache');

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url');
if($_SERVER['HTTP_HOST'] == 'pql.vn' || $_SERVER['HTTP_HOST'] == 'pql.nn-center.com'
	|| $_SERVER['HTTP_HOST'] == 'mobo.com.vn' || $_SERVER['HTTP_HOST'] == 'www.mobo.com.vn') {
	$autoload['helper'][] = 'wpglobus';
}

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
if(($_SERVER['HTTP_HOST'] == 'pql.vn') || ($_SERVER['HTTP_HOST'] == 'pql.nn-center.com'
		|| $_SERVER['HTTP_HOST'] == 'mobo.com.vn' || $_SERVER['HTTP_HOST'] == 'www.mobo.com.vn')) {
	$autoload['model']['pql/options_model'] = 'options_model';
	$autoload['model']['pql/posts_model'] = 'posts_model';
	$autoload['model']['pql/links_model'] = 'links_model';
	$autoload['model']['pql/terms_model'] = 'terms_model';
}

if(($_SERVER['HTTP_HOST'] == 'admin.qlhs.vn')) {
			$autoload['model']['qlhs/student_model'] = 'student_model';
			$autoload['model']['qlhs/classes_model'] = 'classes_model';
			$autoload['model']['qlhs/class_student_model'] = 'class_student_model';
			$autoload['model']['qlhs/advice_model'] = 'advice_model';
			$autoload['model']['qlhs/general_order_model'] = 'general_order_model';
			$autoload['model']['qlhs/student_schedule_model'] = 'student_schedule_model';
			$autoload['model']['qlhs/student_order_model'] = 'student_order_model';
}