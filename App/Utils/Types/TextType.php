<?php

namespace Blog\Utils\Types;

class TextType extends Field
{
    public function buildWidget(): string
    {
        $requiredLabel = $this->isRequired() ? '*' : '';
        $errorMessage = $this->getErrorMessage() ? "<p class=\"form__error\">{$this->getErrorMessage()}</p>" : "";

        return "
            <div class=\"form__group\">
                <label for=\"{$this->getName()}\" class=\"form__label\">{$this->getLabel()} <span class=\"required\">{$requiredLabel}</span></label>
                <input type=\"text\" name=\"{$this->getName()}\" id=\"{$this->getName()}\" class=\"form__input\" value=\"{$this->getValue()}\" placeholder=\"{$this->getPlaceholder()}\">
                {$errorMessage}
            </div>
        ";
    }
}
