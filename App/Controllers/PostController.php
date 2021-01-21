<?php

namespace Blog\Controllers;

use Blog\TemplateEngine;

class PostController extends TemplateEngine
{
    public function articleList()
    {
        return $this->render('frontend/blog');
    }
}
