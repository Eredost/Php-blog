<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\EmailType;
use Blog\Utils\Types\PasswordType;
use Blog\Utils\Validators\EmailValidator;
use Blog\Utils\Validators\LengthValidator;
use Blog\Utils\Validators\NotBlankValidator;

class LoginForm extends FormBuilder
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
                ],
            ])
        ;
    }
}
