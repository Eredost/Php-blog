<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\EmailType;
use Blog\Utils\Types\SubmitType;
use Blog\Utils\Types\TextAreaType;
use Blog\Utils\Types\TextType;
use Blog\Utils\Validators\EmailValidator;
use Blog\Utils\Validators\LengthValidator;
use Blog\Utils\Validators\NotBlankValidator;

class EmailForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('name', TextType::class, [
            'label'       => 'Nom',
            'placeholder' => 'Votre nom',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner votre nom',
                ]),
                new LengthValidator([
                    'minLength'  => 3,
                    'maxLength'  => 105,
                    'minMessage' => 'Le nom doit comporter au minimum %d caractères',
                    'maxMessage' => 'Le nom doit comporter au maximum %d caractères',
                ])
            ],
        ])
        ->add('email', EmailType::class, [
            'placeholder' => 'Votre email',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner votre email',
                ]),
                new EmailValidator(),
            ],
        ])
        ->add('subject', TextType::class, [
            'placeholder' => 'Le sujet de votre message',
            'label'       => 'Sujet',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner le sujet de votre message',
                ]),
                new LengthValidator([
                    'maxLength'  => 150,
                    'maxMessage' => 'Le sujet de votre message ne peut pas dépasser %d caractères',
                ])
            ],
        ])
        ->add('message', TextAreaType::class, [
            'placeholder' => 'Votre message',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner votre message'
                ]),
                new LengthValidator([
                    'minLength'  => 20,
                    'maxLength'  => 500,
                    'minMessage' => 'Votre message doit contenir au minimum %d caractères',
                    'maxMessage' => 'Votre message doit contenir au maximum %d caractères',
                ])
            ],
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Envoyer',
        ]);
    }
}
