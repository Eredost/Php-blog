<?php

namespace Blog\Utils\Validators;

abstract class Validator
{
    /** @var string $errorMessage */
    protected $errorMessage;

    /**
     * Verifies the compliance of the user input with the validation constraint
     *
     * @param mixed $value
     *
     * @return bool
     */
    abstract public function isValid($value);

    /**
     * @return string|null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }
}
