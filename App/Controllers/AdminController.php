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

    public function deleteComment($params)
    {
        if (!$this->request->isGranted('ROLE_ADMIN')) {

            throw new \Exception('Vous n\'êtes pas autorisé à accéder à cette page');
        }
        $adminForm = new AdminForm();
        $adminForm->handleRequest($this->request->request());

        if ($adminForm->isValid()) {
            if (!$comment = CommentManager::find($params['commentId'])) {

                throw new \Exception('Le commentaire que vous recherchez n\'existe pas');
            }
            $comment->delete();
            $this->request->addFlashMessage('success', 'Le commentaire a été supprimé avec succès');
        }

        return $this->redirect($this->router->generate('adminShow'));
    }

    public function validateComment($params)
    {
        if (!$this->request->isGranted('ROLE_ADMIN')) {

            throw new \Exception('Vous n\'êtes pas autorisé à accéder à cette page');
        }
        $adminForm = new AdminForm();
        $adminForm->handleRequest($this->request->request());

        if ($adminForm->isValid()) {
            if (!$comment = CommentManager::find($params['commentId'])) {

                throw new \Exception('Le commentaire que vous recherchez n\'existe pas');
            }
            $comment->setIsValidated(true);
            $comment->update();
            $this->request->addFlashMessage('success', 'Le commentaire a été validé avec succès');
        }

        return $this->redirect($this->router->generate('adminShow'));
    }
}
