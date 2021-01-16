<?php

namespace Blog\Utils\Types;

class SubmitType extends Field
{
    public function buildWidget(): string
    {
        return "
            <input type='submit' value='{$this->getLabel()}' class='button square'>
        ";
    }
}
