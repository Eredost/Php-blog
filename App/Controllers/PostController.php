<?php

namespace Blog\Controllers;

use AttributesRouter\Attribute\Route;
use Blog\Exceptions\NotFoundException;
use Blog\Forms\CommentForm;
use Blog\Models\Comment;
use Blog\Models\CommentManager;
use Blog\Models\PostManager;
use Blog\TemplateEngine;

class PostController extends TemplateEngine
{
    #[Route('/blog', name: 'articleList')]
    public function articleList()
    {
        $posts = PostManager::findAllPostWithAuthorAndCommentCount();
        $lastPosts = PostManager::findLastPosts();

        return $this->render('frontend/blog', [
            'posts'     => $posts,
            'lastPosts' => $lastPosts,
        ]);
    }

    #[Route('/blog/{postId<\d+>}', name: 'articleShow', methods: ['GET', 'POST'])]
    public function articleShow($params)
    {
        if (!$post = PostManager::findOnePostWithAuthorName($params['postId'])) {

            throw new NotFoundException('L\'article que vous recherchez n\'existe pas');
        }
        $lastPosts = PostManager::findLastPosts();
        $comments = CommentManager::findAllCommentsByPostId($params['postId']);

        $comment = new Comment();
        $commentForm = new CommentForm($comment);
        $commentForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $this->request->isAuthenticated() && $commentForm->isValid()) {
            $comment->setPostId($post->getId())
                ->setUserId($this->request->getCurrentUser()->getId())
                ->setIsValidated($this->request->isGranted('ROLE_ADMIN'))
                ->save()
            ;
            if ($comment->getIsValidated()) {
                $this->request->addFlashMessage('success', 'Votre commentaire a bien été ajouté.');
            } else {
                $this->request->addFlashMessage('success', 'Votre commentaire a bien été ajouté, cependant celui-ci devra d\'abord être vérifié et validé par un administrateur afin d\'être visible');
            }

            return $this->redirect($this->router->generate('articleShow', ['postId' => $post->getId()]) . '#comment');
        }

        return $this->render('frontend/article', [
            'post'        => $post,
            'lastPosts'   => $lastPosts,
            'comments'    => $comments,
            'commentForm' => $commentForm->createView(),
        ]);
    }
}
