<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class IsTrueValidator extends Validator
{
    use HydratorTrait;

    /** @var string $message */
    private $message = 'Ce champ est obligatoire';

    /**
     * IsTrueValidator constructor.
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
            || $value === FALSE) {

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
