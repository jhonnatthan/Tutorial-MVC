<?php
    define('DS', DIRECTORY_SEPARATOR);
	define('BASE_PATH', dirname(__FILE__));
	define('VIEW_PATH', BASE_PATH . DS . 'app' . DS . 'Views' . DS);
	define('CONTROLLER_PATH', BASE_PATH . DS . 'app' . DS . 'Controllers' . DS);
	define('MODEL_PATH', BASE_PATH . DS . 'app' . DS . 'Models' . DS);

	ini_set('display_erros', true);
	error_reporting(E_ALL);

	date_default_timezone_set('America/Sao_Paulo');

	