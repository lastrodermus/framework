<?php

//var_dump($_SERVER);

define('PROJECT', 'framework/');

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT);
define('VIEW', ROOT . 'View/');
define('MODEL', ROOT . 'Model/');
define('CONTROLLER', ROOT . 'Controller/');
define('CONFIG', ROOT . 'config/');
define('BD', ROOT . 'Base/');
define('DAO', MODEL . 'DAO/');
define('BD', DAO . 'Base/');
define('ROOT_WEB', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . PROJECT);
