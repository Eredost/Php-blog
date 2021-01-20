<?php

namespace Blog\Controllers;

use Blog\Forms\LoginForm;
use Blog\Forms\SignupForm;
use Blog\Models\User;
use Blog\Models\UserManager;
use Blog\TemplateEngine;

class SecurityController extends TemplateEngine
{
    public function login()
    {
        $loginForm = new LoginForm();
        $loginForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $loginForm->isValid()) {
            $user = UserManager::findUserByEmail($loginForm->get('email'));

            if (!empty($user) && password_verify($loginForm->get('password'), $user->getPassword())) {
                $this->request->setCurrentUser($user);

                return $this->redirect($this->router->generate('homepage'));
            }

            $this->request->addFlashMessage('error', 'Les informations d\'identification sont invalides');
        }

        return $this->render('frontend/login', [
            'loginForm' => $loginForm->createView(),
        ]);
    }

    public function signup()
    {
        $user = new User();
        $signupForm = new SignupForm($user);
        $signupForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $signupForm->isValid()) {
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
