<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;
use Blog\Utils\Request;

class CsrfTokenValidator extends Validator
{
    use HydratorTrait;

    /** @var string $message */
    private $message = 'Le token CSRF est manquant ou invalide';

    /**
     * CsrfTokenValidator constructor.
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
        $request = new Request();
        $csrfToken = $request->getCsrfToken();

        if (empty($csrfToken)
            || empty($value)
            || !hash_equals($csrfToken, $value)) {

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
