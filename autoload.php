<?php

spl_autoload_register(function($class){
	$file = str_replace('\\', '/', $class);
	$file = str_replace('_', '/', $file);
	$file = dirname(__FILE__) . "/src/$file.php";
	if(is_file($file)) include $file;
});
