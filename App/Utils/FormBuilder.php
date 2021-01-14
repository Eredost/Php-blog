<?php

namespace Blog\Utils;

use Blog\Utils\Types\Field;

abstract class FormBuilder
{
    /** @var object $entity */
    protected $entity;

    /** @var array $fields */
    protected $fields = [];

    /**
     * FormBuilder constructor.
     *
     * @param object $entity
     */
    public function __construct(object $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Allows the addition of a new input field
     *
     * @param Field $field
     *
     * @return $this
     */
    protected function add(Field $field)
    {
        $attr = 'get' . ucfirst($field->getName());
        $field->setValue($this->entity->$attr());
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Generate the view from the input fields
     *
     * @return string
     */
    public function createView()
    {
        foreach ($this->fields as $field) {

            yield $field->buildWidget();
        }
    }

    /**
     * Used to check if all input fields are valid according
     * to the validation constraints provided
     *
     * @return bool
     */
    public function isValid()
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
