<?php

namespace Blog\Controllers;

use AttributesRouter\Attribute\Route;
use Blog\Forms\ContactForm;
use Blog\TemplateEngine;
use Blog\Utils\Mailer;

class MainController extends TemplateEngine
{
    #[Route('/', name: 'homepage', methods: ['GET', 'POST'])]
    public function home()
    {
        $contactForm = new ContactForm();
        $contactForm->handleRequest($this->request->request());

        if ($this->request->isMethod('post') && $contactForm->isValid()) {
            if (Mailer::sendContactMessage($contactForm->getValues())) {
                $this->request->addFlashMessage('success', 'Votre message a bien été envoyé, nous vous recontacterons dans les plus brefs délais.');
            } else {
                $this->request->addFlashMessage('error', 'Une erreur est survenue, veuillez réessayez plus tard. Si le problème subsiste, contactez l\'administrateur du site.');
            }

            return $this->redirect($this->router->generateUrl('homepage'));
        }

        return $this->render('frontend/homepage', [
            'contactForm' => $contactForm->createView(),
        ]);
    }

    #[Route('/mentions-legales', name: 'legalMentions')]
    public function legalMentions()
    {
        return $this->render('frontend/legalMentions');
    }

    #[Route('/politique-de-confidentialite', name: 'privacyPolicy')]
    public function privacyPolicy()
    {
        return $this->render('frontend/privacyPolicy');
    }

    #[Route('/cv', name: 'cv')]
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
