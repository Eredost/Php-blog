<?php

use Blog\App;
use Blog\Utils\Request;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

session_start();

$request = new Request();

$app = App::getInstance($request->baseURI());
$app->handleRequest();
