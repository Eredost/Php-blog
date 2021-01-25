<?php

namespace Blog\Controllers;

use Blog\Forms\AdminForm;
use Blog\Forms\ArticleForm;
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

    public function editArticle($params)
    {
        if (!$this->request->isGranted('ROLE_ADMIN')) {

            throw new \Exception('Vous n\'êtes pas autorisé à accéder à cette page');
        }

        if (!$post = PostManager::find($params['postId'])) {

            throw new \Exception('L\'article que vous recherchez n\'existe pas');
        }
        $editForm = new ArticleForm($post);
        $editForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $editForm->isValid()) {
            $file = $this->request->getUploadedFiles()['image'];

            if (isset($file)
                && !empty($file['name'])) {

                $uploadDir = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . time() . $file['name'];
                move_uploaded_file($file['tmp_name'], dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'public' . $uploadDir);
                $post->setImage($this->request->baseURI() . $uploadDir);
            }
            $post->update();
            $this->request->addFlashMessage('success', 'L\'article a été modifié avec succès');

            return $this->redirect($this->router->generate('adminEditArticle', ['postId' => $params['postId']]));
        }

        return $this->render('backend/editForm', [
            'editForm' => $editForm->createView(),
            'postId'   => $params['postId'],
        ]);
    }

    public function deleteArticle($params)
    {
        if (!$this->request->isGranted('ROLE_ADMIN')) {

            throw new \Exception('Vous n\'êtes pas autorisé à accéder à cette page');
        }
        $adminForm = new AdminForm();
        $adminForm->handleRequest($this->request->request());

        if ($adminForm->isValid()) {
            if (!$post = PostManager::find($params['postId'])) {

                throw new \Exception('L\'article que vous recherchez n\'existe pas');
            }
            $post->delete();
            $this->request->addFlashMessage('success', 'L\'article a été supprimé avec succès');
        }

        return $this->redirect($this->router->generate('adminShow'));
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
