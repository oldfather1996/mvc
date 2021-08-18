<?php

use mvc\src\Dispatcher;

require '../vendor/autoload.php';

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


// require(ROOT . 'src/views/tasks/create.php');
// require(ROOT . 'src/views/tasks/edit.php');
// require(ROOT . 'src/views/tasks/index.php');
// require(ROOT . 'src/dispatcher.php');


$dispatch = new Dispatcher();
$dispatch->dispatch();
