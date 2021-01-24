<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\CsrfTokenType;
use Blog\Utils\Types\SubmitType;
use Blog\Utils\Types\TextAreaType;
use Blog\Utils\Validators\CsrfTokenValidator;
use Blog\Utils\Validators\LengthValidator;
use Blog\Utils\Validators\NotBlankValidator;

class CommentForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('content', TextAreaType::class, [
            'label'       => 'Message',
            'placeholder' => 'Votre message...',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner votre message'
                ]),
                new LengthValidator([
                    'minLength'  => 3,
                    'maxLength'  => 500,
                    'minMessage' => 'Votre message doit contenir au minimum %d caractères',
                    'maxMessage' => 'Votre message doit contenir au maximum %d caractères',
                ])
            ],
        ])
            ->add('token', CsrfTokenType::class, [
                'validators' => [
                    new CsrfTokenValidator(),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }
}
