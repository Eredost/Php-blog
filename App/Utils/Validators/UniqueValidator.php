<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;
use InvalidArgumentException;

class UniqueValidator extends Validator
{
    use HydratorTrait;

    /** @var string $classFQCN */
    private $classFQCN;

    /** @var string $method */
    private $method;

    /** @var string $columnName */
    private $columnName;

    /** @var string $message */
    private $message = "Cette valeur est déjà utilisée";

    /**
     * UniqueValidator constructor.
     *
     * @param array $options
     *
     * @throws InvalidArgumentException When one of the necessary properties is missing
     */
    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }

        if (!isset($this->classFQCN, $this->method, $this->columnName)) {

            throw new InvalidArgumentException('Les propriétés classFQCN, method et columnName doivent être renseignées afin de pouvoir appeller la méthode de selection');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isValid($value): bool
    {
        if (!empty($value)
            && $this->classFQCN::{$this->method}($this->columnName, $value)) {

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
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @param string $columnName
     */
    public function setColumnName(string $columnName)
    {
        $this->columnName = $columnName;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}
