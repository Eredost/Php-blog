<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\EmailType;
use Blog\Utils\Types\PasswordType;
use Blog\Utils\Types\TextType;
use Blog\Utils\Validators\EmailValidator;
use Blog\Utils\Validators\LengthValidator;
use Blog\Utils\Validators\NotBlankValidator;
use Blog\Utils\Validators\PasswordValidator;

class SignupForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('email', EmailType::class, [
            'required'   => true,
            'validators' => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner un email'
                ]),
                new EmailValidator(),
                new LengthValidator([
                    'maxLength'  => 255,
                    'maxMessage' => 'L\'email ne peut pas dépasser %d caractères'
                ]),
            ],
        ])
            ->add('username', TextType::class, [
                'label'      => 'Nom d\'utilisateur',
                'required'   => true,
                'validators' => [
                    new NotBlankValidator([
                        'message' => 'Vous devez renseigner un nom d\'utilisateur'
                    ]),
                    new LengthValidator([
                        'minLength'  => 3,
                        'maxLength'  => 40,
                        'minMessage' => 'Votre nom d\'utilisateur doit comporter au minimum %d caractères',
                        'maxMessage' => 'Votre nom d\'utilisateur doit comporter au maximum %d caractères',
                    ])
                ],
            ])
            ->add('password', PasswordType::class, [
                'label'      => 'Mot de passe',
                'required'   => true,
                'validators' => [
                    new NotBlankValidator([
                        'message' => 'Vous devez renseigner un mot de passe',
                    ]),
                    new LengthValidator([
                        'minLength'  => 8,
                        'maxLength'  => 40,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum %d caractères',
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum %d caractères',
                    ]),
                    new PasswordValidator()
                ],
            ])
        ;
    }
}
