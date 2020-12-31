<?php

use Blog\App;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$baseURI = $_SERVER['BASE_URI'] ?? '';
$app = App::getInstance($baseURI);
$app->handleRequest();
