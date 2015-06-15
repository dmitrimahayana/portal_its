<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* ITS Constants */
define('FAKULTAS_MENU','fakultas');
define('UNIT_KERJA_MENU','unit-kerja');
define('SIDEBAR_MENU_INDEX', 1);
define('FOOTER_MENU_INDEX', 3);
define('PAGINATION_MULTIPLY', 5);
define('MAXIMUM_ATTEMPT_LOGIN', 3);
define('INTERACTIVE_WIDTH', 720);
define('INTERACTIVE_HEIGHT', 405);
define('MAX_INTEGER', 2147483647);

define('MENU_SIDEBAR', 1);
define('MENU_FIXED', 6);
define('MENU_EXTEND', 7);
define('ONE_DAY', 86400);
define('TWO_WEEKS', 1209600);

define('EMPTY_STRING', 'd41d8cd98f00b204e9800998ecf8427e');
// Define Ajax Request
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
/* End of file constants.php */
/* Location: ./application/config/constants.php */