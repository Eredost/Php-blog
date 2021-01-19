<?php

namespace Blog\Controllers;

use Blog\TemplateEngine;

class SecurityController extends TemplateEngine
{
    public function login()
    {

    }

    public function signup()
    {
        return $this->render('frontend/signup');
    }

    public function disconnect()
    {
        session_destroy();

        return $this->redirect($this->router->generate('homepage'));
    }
}