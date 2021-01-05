<?php

namespace Blog\Controllers;

use Blog\TemplateEngine;

class MainController extends TemplateEngine
{
    public function home()
    {
        return $this->render('frontend' . DIRECTORY_SEPARATOR . 'homepage');
    }
}
