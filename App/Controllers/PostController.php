<?php

namespace Blog\Controllers;

use Blog\Forms\CommentForm;
use Blog\Models\Comment;
use Blog\Models\CommentManager;
use Blog\Models\PostManager;
use Blog\TemplateEngine;

class PostController extends TemplateEngine
{
    public function articleList()
    {
        $posts = PostManager::findAllPostWithAuthorAndCommentCount();
        $lastPosts = PostManager::findLastPosts();

        return $this->render('frontend/blog', [
            'posts'     => $posts,
            'lastPosts' => $lastPosts,
        ]);
    }

    public function articleShow($params)
    {
        if (!$post = PostManager::findOnePostWithAuthorName($params['postId'])) {

            throw new \Exception('L\'article que vous recherchez n\'existe pas');
        }
        $lastPosts = PostManager::findLastPosts();
        $comments = CommentManager::findAllCommentsByPostId($params['postId']);

        $comment = new Comment();
        $commentForm = new CommentForm($comment);
        $commentForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $this->request->isAuthenticated() && $commentForm->isValid()) {
            // TODO: implement form submit
        }

        return $this->render('frontend/article', [
            'post'        => $post,
            'lastPosts'   => $lastPosts,
            'comments'    => $comments,
            'commentForm' => $commentForm->createView(),
        ]);
    }
}
