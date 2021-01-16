<?php

namespace Blog\Utils\Types;

class PasswordType extends Field
{
    public function buildWidget(): string
    {
        $requiredLabel = $this->getRequired() ? '*' : '';

        return "
            <div class=\"form__group\">
                <label for=\"{$this->getName()}\" class=\"form__label\">{$this->getLabel()} <span class=\"required\">{$requiredLabel}</span></label>
                <input type=\"password\" name=\"{$this->getName()}\" id=\"{$this->getName()}\" class=\"form__input\" placeholder=\"{$this->getPlaceholder()}\">
                <p class=\"form__error\">{$this->getErrorMessage()}</p>
            </div>
        ";
    }
}
