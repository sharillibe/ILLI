<?PHP

	define('ILLI_APP_PATH', dirname(dirname(__DIR__)) . '/app');
	define('ILLI_LIB_PATH', dirname(dirname(__DIR__)) . '/lib');
	
	require_once ILLI_LIB_PATH.'/ILLI/Core/Shell/Lib.php';
	
	USE ILLI\Core\Shell\Lib;
	
	Lib::appPath(ILLI_APP_PATH);
	Lib::libPath(ILLI_LIB_PATH);
	
	Lib::add('ILLI');
	Lib::add('App', [
		'default' => true
	]);
	