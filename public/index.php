<?php

use Blog\App;
use Blog\Utils\Request;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

session_start();

$app = App::getInstance();
$app->handleRequest();
