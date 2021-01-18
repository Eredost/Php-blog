<?php

namespace Blog\Controllers;

use Blog\Forms\EmailForm;
use Blog\TemplateEngine;
use Blog\Utils\Request;

class MainController extends TemplateEngine
{
    public function home()
    {
        $request = new Request();
        $contactForm = new EmailForm();
        $contactForm->handleRequest($request->request());

        if ($request->isMethod('post') && $contactForm->isValid()) {
            echo 'Its good';
        }

        return $this->render('frontend/homepage', [
            'contactForm' => $contactForm->createView()
        ]);
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
