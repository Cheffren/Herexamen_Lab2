<?php
spl_autoload_register(function($class){
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "Classes" . DIRECTORY_SEPARATOR . $class . ".php");
});
date_default_timezone_set("Europe/Brussels");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);