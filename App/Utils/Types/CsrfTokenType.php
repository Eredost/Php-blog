<?php

namespace Blog\Utils\Types;

use Blog\Utils\Request;

class CsrfTokenType extends Field
{
    public function buildWidget(): string
    {
        $request = new Request();
        $errorMessage = $this->getErrorMessage() ? "<p class=\"form__error mb\">{$this->getErrorMessage()}</p>" : "";

        return "
            <div class=\"form__group hidden\">
                <input type=\"hidden\" name=\"{$this->getName()}\" id=\"{$this->getName()}\" value=\"{$request->getCsrfToken()}\">
                {$errorMessage}
            </div>
        ";
    }
}
