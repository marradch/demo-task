<?php

session_start();

spl_autoload_register(function($class) {	
	$parts = explode('\\', $class);
	$class = $parts[count($parts) - 1];
	$nc = strtolower($parts[0]);
	switch ($nc) {
		case "helpers":
			$dir = 'classes';
			break;
		case "managers":
			$dir = 'models';
			break;	
		case "database":
			$dir = 'classes';
			break;
		default:
			$dir = $nc;
			break;
	}	
    require_once __DIR__.'\\'.$dir .'\\'. $class . '.php';
});

use Helpers\UrlHelper;

$urlArr = UrlHelper::parseUrl();

extract($urlArr);

$className = ucfirst($controller).'Controller';
$path = $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$className.'.php';
if(!file_exists($path)){	
	throw new Exception("controller \"$controller\" not found");
}

$className = 'Controllers\\'.ucfirst($controller).'Controller';

$controllerObj = new $className();

$controllerObj->$action($params);

//call_user_func_array(array($controllerObj, $action), $params);

?>
