<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\CsrfTokenType;
use Blog\Utils\Types\FileType;
use Blog\Utils\Types\NumberType;
use Blog\Utils\Types\TextAreaType;
use Blog\Utils\Types\TextType;
use Blog\Utils\Validators\CsrfTokenValidator;
use Blog\Utils\Validators\ImageFileValidator;
use Blog\Utils\Validators\IsNumberValidator;
use Blog\Utils\Validators\LengthValidator;
use Blog\Utils\Validators\NotBlankValidator;

class ArticleForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('title', TextType::class, [
            'label'       => 'Titre',
            'placeholder' => 'Votre titre...',
            'required'    => true,
            'validators'  => [
                new NotBlankValidator([
                    'message' => 'Le titre de l\'article ne peut pas être vide'
                ]),
                new LengthValidator([
                    'minLength'  => 5,
                    'maxLength'  => 160,
                    'minMessage' => 'Le titre doit contenir au minimum %d caractères',
                    'maxMessage' => 'Le titre doit contenir au maximum %d caractères',
                ])
            ],
        ])
            ->add('image', FileType::class, [
                'label'      => 'Image de mise en avant',
                'validators' => [
                    new ImageFileValidator([
                        'inputName' => 'image'
                    ]),
                ],
            ])
            ->add('summary', TextType::class, [
                'label'       => 'Chapô',
                'placeholder' => 'Votre chapô...',
                'required'    => true,
                'validators'  => [
                    new NotBlankValidator([
                        'message' => 'Le chapô de l\'article ne peut pas être vide'
                    ]),
                    new LengthValidator([
                        'minLength'  => 5,
                        'maxLength'  => 255,
                        'minMessage' => 'Le chapô doit contenir au minimum %d caractères',
                        'maxMessage' => 'Le chapô doit contenir au maximum %d caractères',
                    ])
                ],
            ])
            ->add('content', TextAreaType::class, [
                'label'       => 'Contenu',
                'placeholder' => 'Votre contenu...',
                'required'    => true,
                'validators'  => [
                    new NotBlankValidator([
                        'message' => 'Le contenu du message ne peut pas être vide'
                    ])
                ],
            ])
            ->add('userId', NumberType::class, [
                'label'       => 'Auteur',
                'placeholder' => 'L\'identifiant de l\'auteur',
                'required'    => true,
                'validators'  => [
                    new NotBlankValidator([
                        'message' => 'L\'auteur du message de ne peut pas être vide',
                    ]),
                    new IsNumberValidator([
                        'message' => 'L\'identifiant de l\'auteur doit être un nombre',
                    ]),
                ],
            ])
            ->add('token', CsrfTokenType::class, [
                'validators' => [
                    new CsrfTokenValidator(),
                ],
            ])
        ;
    }
}
