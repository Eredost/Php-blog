<?php

namespace Blog\Controllers;

use Blog\Forms\AdminForm;
use Blog\Models\CommentManager;
use Blog\Models\PostManager;
use Blog\TemplateEngine;

class AdminController extends TemplateEngine
{
    public function adminShow()
    {
        if (!$this->request->isGranted('ROLE_ADMIN')) {

            throw new \Exception('Vous n\'êtes pas autorisé à accéder à cette page');
        }

        $adminForm = new AdminForm();
        $posts = PostManager::findAll();
        $comments = CommentManager::findAllNonValidatedComments();

        return $this->render('backend/admin', [
            'posts'     => $posts,
            'comments'  => $comments,
            'adminForm' => $adminForm->createView(),
        ]);
    }

    public function addArticle()
    {

    }
}
