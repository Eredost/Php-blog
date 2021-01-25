<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class IsNumberValidator extends Validator
{
    use HydratorTrait;

    /** @var string $message */
    private $message = 'Vous devez renseigner un nombre';

    /**
     * IsNumberValidator constructor.
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
            && !is_int((int) $value)) {

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