<?php

namespace Blog\Controllers;

use Blog\Models\PostManager;
use Blog\TemplateEngine;

class PostController extends TemplateEngine
{
    public function articleList()
    {
        $posts = PostManager::findAllPostWithAuthorAndCommentCount();

        return $this->render('frontend/blog', [
            'posts' => $posts
        ]);
    }

    public function articleShow()
    {

    }
}
