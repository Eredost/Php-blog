<?php

namespace Blog\Utils\Types;

class TextAreaType extends Field
{
    public function buildWidget(): string
    {
        $requiredLabel = $this->isRequired() ? "*" : "";
        $errorMessage = $this->getErrorMessage() ? "<p class=\"form__error\">{$this->getErrorMessage()}</p>" : "";

        return "
            <div class=\"form__group\">
                <label for=\"{$this->getName()}\" class=\"form__label\">{$this->getLabel()} <span class=\"required\">{$requiredLabel}</span></label>
                <textarea name=\"{$this->getName()}\" id=\"{$this->getName()}\" cols=\"30\" rows=\"10\" class=\"form__input\" placeholder=\"{$this->getPlaceholder()}\">{$this->getValue()}</textarea>
                {$errorMessage}
            </div>
        ";
    }
}
