<?php

namespace Blog\Utils;

use Blog\Utils\Types\Field;

abstract class FormBuilder
{
    /** @var object|null $entity */
    protected $entity;

    /** @var Field[] $fields */
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
     *
     * @param array $request
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
     * @param string $name      The name of the input used for the label and input tags
     * @param string $fieldFQCN Full qualified class name in order to instantiate a new object
     * @param array  $options   Option array for the input field
     *
     * @return $this
     */
    protected function add(string $name, string $fieldFQCN, array $options = []): FormBuilder
    {
        $options['name'] = $name;
        $field = new $fieldFQCN($options);

        if (!$field instanceof Field) {

            throw new \InvalidArgumentException('The input field ' . $name . ' must extends Field class');
        }
        $this->fields[$name] = $field;

        if ($this->entity && method_exists($this->entity, 'get'.ucfirst($field->getName()))) {
            $field->setValue($this->entity->{'get'.ucfirst($field->getName())}());
        }

        return $this;
    }

    /**
     * Allows the retrieval of a value of an input field of the form according to the
     * name of this one
     *
     * @param string $name The name of the input field
     *
     * @return string|null
     */
    public function get(string $name): ?string
    {
        if (array_key_exists($name, $this->fields)) {

            return $this->fields[$name]->getValue();
        }

        return null;
    }

    /**
     * Allows the retrieval of all the values of the input fields
     *
     * @return array
     */
    public function getValues(): array
    {
        $values = [];

        foreach ($this->fields as $field) {
            if (!empty($field->getValue())) {
                $values[$field->getLabel()] = $field->getValue();
            }
        }

        return $values;
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
