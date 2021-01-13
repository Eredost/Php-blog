<?php

namespace Blog\Controllers;

use Blog\TemplateEngine;

class MainController extends TemplateEngine
{
    public function home()
    {
        return $this->render('frontend/homepage');
    }

    public function legalMentions()
    {
        return $this->render('frontend/legalMentions');
    }

    public function privacyPolicy()
    {
        return $this->render('frontend/privacyPolicy');
    }

    public function showCV()
    {
        $file = 'uploads/documents/cv.pdf';
        $fileName = 'cv.pdf';

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $fileName . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}
