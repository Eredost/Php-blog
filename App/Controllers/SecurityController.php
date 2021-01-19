<?php

namespace Blog\Controllers;

use Blog\Forms\LoginForm;
use Blog\Forms\SignupForm;
use Blog\Models\User;
use Blog\TemplateEngine;
use Blog\Utils\Request;

class SecurityController extends TemplateEngine
{
    public function login()
    {
        $request = new Request();
        $loginForm = new LoginForm();
        $loginForm->handleRequest($request->request());

        if ($request->isMethod('post') && $loginForm->isValid()) {
            // TODO: Implement login form submit
        }

        return $this->render('frontend/login', [
            'loginForm' => $loginForm->createView(),
        ]);
    }

    public function signup()
    {
        $request = new Request();
        $user = new User();
        $signupForm = new SignupForm($user);
        $signupForm->handleRequest($request->request());

        if ($request->isMethod('post') && $signupForm->isValid()) {
            // TODO: Implement signup form submit
        }

        return $this->render('frontend/signup', [
            'signupForm' => $signupForm->createView(),
        ]);
    }

    public function disconnect()
    {
        session_destroy();

        return $this->redirect($this->router->generate('homepage'));
    }
}
