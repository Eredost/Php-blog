<?php

use Blog\App;
use Blog\Exceptions\HttpException;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

session_start();

try {
    $app = App::getInstance();
    $app->handleRequest();
} catch (HttpException $e) {
    $e->renderTemplate();
} catch (Exception $e) {
    echo <<< HTML
        {$e->getMessage()} <br>
        <pre>
            {$e->getTraceAsString()}
        </pre>
HTML;
}
