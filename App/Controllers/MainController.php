<?php

namespace Blog\Controllers;

use Blog\Forms\EmailForm;
use Blog\TemplateEngine;
use Blog\Utils\Mailer;
use Blog\Utils\Request;

class MainController extends TemplateEngine
{
    public function home()
    {
        $request = new Request();
        $contactForm = new EmailForm();
        $contactForm->handleRequest($request->request());

        if ($request->isMethod('post') && $contactForm->isValid()) {
            if (Mailer::sendContactMessage($contactForm->getValues())) {
                $request->addFlashMessage('success', 'Votre message a bien été envoyé, nous vous recontacterons dans les plus brefs délais.');
            } else {
                $request->addFlashMessage('error', 'Une erreur est survenue, veuillez réessayez plus tard. Si le problème subsiste, contactez l\'administrateur du site.');
            }

            return $this->redirect($this->router->generate('homepage'));
        }

        return $this->render('frontend/homepage', [
            'contactForm' => $contactForm->createView(),
            'request'     => $request,
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
