<?php

use Blog\App;
use Blog\Utils\Request;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$app = App::getInstance(Request::baseURI());
$app->handleRequest();
