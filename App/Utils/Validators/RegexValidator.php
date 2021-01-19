<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class RegexValidator extends Validator
{
    use HydratorTrait;

    /** @var string $regex */
    private $regex;

    /** @var string $message */
    private $message = 'Ce champ n\'est pas valide';

    /**
     * RegexValidator constructor.
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
            && !preg_match($this->regex, $value)) {

            $this->setErrorMessage($this->message);
        }

        return empty($this->getErrorMessage());
    }

    /**
     * @param string $regex
     */
    public function setRegex(string $regex)
    {
        $this->regex = $regex;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}
