<?php

namespace Blog\Utils;

use Blog\Utils\Types\Field;

abstract class FormBuilder
{
    /** @var object|null $entity */
    protected $entity;

    /** @var array $fields */
    protected $fields = [];

    /**
     * FormBuilder constructor.
     *
     * @param object|null $entity
     */
    public function __construct(?object $entity = null)
    {
        $this->entity = $entity;
        $this->buildForm();
    }

    /**
     * Allows you to specify the fields to display with their associated options
     * and validators
     */
    abstract protected function buildForm();

    /**
     * Retrieves the request and fills the form values with the data sent
     */
    public function handleRequest(array $request): void
    {
        foreach ($this->fields as $field) {
            if (array_key_exists($field->getName(), $request)) {
                $field->setValue($request[$field->getName()]);
            }
        }
    }

    /**
     * Allows the addition of a new input field
     *
     * @param Field $field
     *
     * @return $this
     */
    protected function add(Field $field): FormBuilder
    {
        if ($this->entity && method_exists($this->entity, 'get'.ucfirst($field->getName()))) {
            $field->setValue($this->entity->{'get'.ucfirst($field->getName())}());
        }
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Generate the view from the input fields
     *
     * @return string
     */
    public function createView(): string
    {
        $view = '';

        foreach ($this->fields as $field) {
            $view .= $field->buildWidget();
        }

        return $view;
    }

    /**
     * Used to check if all input fields are valid according
     * to the validation constraints provided
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $valid = true;

        foreach ($this->fields as $field) {
            if (!$field->isValid()) {
                $valid = false;
            }
        }

        return $valid;
    }
}
