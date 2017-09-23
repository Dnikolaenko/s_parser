<?php

define('ROOT_DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function ($className) {
	$name = str_replace('\\', DS , $className);
	$path = ROOT_DIR . DS . '..' . DS . 'app' . DS . $name . '.php';
	if (file_exists($path) && is_readable($path)) {
        require_once $path;
    } else {
        die('Class not found ' . $path);
    }
});

?>