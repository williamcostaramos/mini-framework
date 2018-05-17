<?php

//configurações do site
define("BASE_URL", "http://127.0.0.1/framework");
//configuraçõe de banco de dados;
define('HOST', "127.0.0.1");
define('USER', "root");
define('PASS', "");
define('DBSA', "banco");


spl_autoload_register(function($class) {

    if (file_exists('controllers/' . $class . '.php')) {
        require_once 'controllers/' . $class . '.php';
    } else if (file_exists('core/' . $class . '.php')) {
        require_once 'core/' . $class . '.php';
    } else if (file_exists('database/' . $class . '.php')) {
        require 'database/' . $class . '.php';
    }elseif (file_exists('models/'.$class.'.php')) {
        require_once 'models/'.$class.'.php';
        
    }
});

