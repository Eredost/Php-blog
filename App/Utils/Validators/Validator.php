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
    abstract public function isValid($value): bool;

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }
}
