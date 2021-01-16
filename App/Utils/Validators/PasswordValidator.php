<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class PasswordValidator extends Validator
{
    use HydratorTrait;

    /** Check that the string contains at least 8 characters including a letter and a number */
    private const PASSWORD_REGEX = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/i';

    /** @var string $message */
    private $message = 'Votre mot de passe doit contenir au minimum 8 caractères avec une lettre et un chiffre';

    /**
     * PasswordValidator constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isValid($value): bool
    {
        if (!empty($value)
            && !preg_match(self::PASSWORD_REGEX, $value)) {

            $this->setErrorMessage($this->message);
        }

        return empty($this->getErrorMessage());
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}
