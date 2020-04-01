<?php

session_start();

spl_autoload_register(function($class) {
    require_once __DIR__.'\\'.$class . '.php';
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

?>
