<?php

namespace Blog\Utils\Types;

class TextType extends Field
{
    public function buildWidget()
    {
        return "
            <div class='form__group'>
                <label for=\"{$this->getName()}\" class=\"form__label\">{$this->getLabel()}</label>
                <input type='text' name=\"{$this->getName()}\" id=\"{$this->getName()}\" class=\"form__input\" value=\"{$this->getValue()}\">
                <p class='form__error'>{$this->getErrorMessage()}</p>
            </div>
        ";
    }
}