<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class NotBlankValidator extends Validator
{
    use HydratorTrait;

    /** @var string $message */
    private $message = 'Ce champ ne peut pas être vide';

    /**
     * NotBlankValidator constructor.
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
        if (!isset($value)
            || empty($value)) {

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
