<?php

namespace Blog\Utils\Types;

use Blog\Models\Traits\HydratorTrait;
use Blog\Utils\Validators\Validator;

abstract class Field
{
    use HydratorTrait;

    /** @var string $errorMessage */
    private $errorMessage;

    /** @var string $label */
    private $label;

    /** @var string $name */
    private $name;

    /** @var string $value */
    private $value;

    /** @var string $placeholder */
    private $placeholder;

    /** @var boolean $required */
    private $required;

    /** @var Validator[] $validators */
    private $validators = [];

    /**
     * Hydrates all properties of the Field class with the data sent
     * as an argument
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }

        if (empty($this->label)) {
            $this->label = ucfirst($this->name);
        }
    }

    /**
     * Allows to build the HTML structure according to the data provided
     *
     * @return string
     */
    abstract public function buildWidget(): string;

    public function isValid()
    {
        foreach ($this->validators as $validator) {
            if (!$validator->isValid($this->value)) {
                $this->setErrorMessage($validator->getErrorMessage());

                return false;
            }
        }

        return true;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     *
     * @return Field
     */
    public function setErrorMessage(string $errorMessage): Field
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return Field
     */
    public function setLabel(string $label): Field
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Field
     */
    public function setName(string $name): Field
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return Field
     */
    public function setValue(string $value): Field
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Validator[]
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * @param Validator[] $validators
     *
     * @return void
     */
    public function setValidators(array $validators): void
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator && !in_array($validator, $this->validators)) {
                $this->validators[] = $validator;
            }
        }
    }

    /**
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     *
     * @return $this
     */
    public function setPlaceholder(string $placeholder): Field
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return (bool) $this->required;
    }

    /**
     * @param bool $required
     *
     * @return Field
     */
    public function setRequired(bool $required): Field
    {
        $this->required = $required;

        return $this;
    }
}
