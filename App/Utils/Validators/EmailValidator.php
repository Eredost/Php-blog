<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class EmailValidator extends Validator
{
    use HydratorTrait;

    /** @var string $message */
    private $message = 'Cette adresse email n\'est pas valide';

    /**
     * EmailValidator constructor.
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
            && !filter_var($value, FILTER_VALIDATE_EMAIL)) {

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
