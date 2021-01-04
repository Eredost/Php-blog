<?php

namespace Blog\Controllers;

use Blog\TemplateEngine;
use Blog\Models\UserManager;
use Blog\Utils\DBData;

class MainController extends TemplateEngine
{
    public function home()
    {
        return $this->render('frontend' . DIRECTORY_SEPARATOR . 'homepage');
    }
}
