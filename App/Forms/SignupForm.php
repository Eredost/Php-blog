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
use Blog\Utils\Validators\UniqueValidator;

class SignupForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('email', EmailType::class, [
            'placeholder' => 'Votre email',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Vous devez renseigner un email'
                ]),
                new EmailValidator(),
                new LengthValidator([
                    'maxLength'  => 255,
                    'maxMessage' => 'L\'email ne peut pas dépasser %d caractères'
                ]),
                new UniqueValidator([
                    'classFQCN'  => 'Blog\Models\UserManager',
                    'method'     => 'findUserBy',
                    'columnName' => 'email',
                    'message'    => 'Cette email est déjà utilisé',
                ]),
            ],
        ])
            ->add('username', TextType::class, [
                'placeholder' => 'Votre nom d\'utilisateur',
                'label'       => 'Nom d\'utilisateur',
                'required'    => true,
                'validators'  => [
                    new NotBlankValidator([
                        'message' => 'Vous devez renseigner un nom d\'utilisateur'
                    ]),
                    new LengthValidator([
                        'minLength'  => 3,
                        'maxLength'  => 40,
                        'minMessage' => 'Votre nom d\'utilisateur doit comporter au minimum %d caractères',
                        'maxMessage' => 'Votre nom d\'utilisateur doit comporter au maximum %d caractères',
                    ]),
                    new UniqueValidator([
                        'classFQCN'  => 'Blog\Models\UserManager',
                        'method'     => 'findUserBy',
                        'columnName' => 'username',
                        'message'    => 'Ce nom d\'utilisateur est déjà utilisé',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                'placeholder' => '********',
                'label'       => 'Mot de passe',
                'required'    => true,
                'validators'  => [
                    new NotBlankValidator([
                        'message' => 'Vous devez renseigner un mot de passe',
                    ]),
                    new LengthValidator([
                        'minLength'  => 8,
                        'maxLength'  => 40,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum %d caractères',
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum %d caractères',
                    ]),
                    new PasswordValidator(),
                ],
            ])
        ;
    }
}
