<?php

namespace Blog\Forms;

use Blog\Utils\FormBuilder;
use Blog\Utils\Types\CsrfTokenType;
use Blog\Utils\Validators\CsrfTokenValidator;

class AdminForm extends FormBuilder
{
    protected function buildForm()
    {
        $this->add('token', CsrfTokenType::class, [
            'validators' => [
                new CsrfTokenValidator(),
            ]
        ]);
    }
}
