<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;
use InvalidArgumentException;

class EntityValidator extends Validator
{
    use HydratorTrait;

    /** @var string $classFQCN */
    private $classFQCN;

    /** @var string $method */
    private $method;

    /** @var string $message */
    private $message = 'L\'entité précisée n\'existe pas';

    /**
     * EntityValidator constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }

        if (!isset($this->classFQCN, $this->method)) {

            throw new InvalidArgumentException('Les propriétés classFQCN et method doivent être renseignées afin de pouvoir rechercher l\'entité');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isValid($value): bool
    {
        if (!empty($value)
            && !$this->classFQCN::{$this->method}($value)) {

            $this->setErrorMessage($this->message);
        }

        return empty($this->getErrorMessage());
    }

    /**
     * @param string $classFQCN
     */
    public function setClassFQCN(string $classFQCN)
    {
        $this->classFQCN = $classFQCN;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}