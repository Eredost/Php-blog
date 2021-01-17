<?php

namespace Blog\Utils\Types;

class CheckboxType extends Field
{
    /** @var array $choices */
    private $choices;

    public function __construct(array $options = [])
    {
        parent::__construct($options);

        if (array_key_exists('choices', $options)) {
            $this->setChoices($options['choices']);
        }
    }

    public function buildWidget(): string
    {
        $requiredLabel = $this->isRequired() ? '*' : '';

        if (!empty($this->choices)) {
            $checkboxes = '';

            foreach ($this->choices as $id => $label) {
                $checkboxes .= "
                    <label class=\"form__checkbox\" for=\"{$id}\">
                        <input type=\"checkbox\" name=\"{$this->getName()}\" id=\"{$id}\" value=\"{$id}\">
                        {$label}
                        <span class=\"checkmark\"></span>
                    </label>
                ";
            }

            return "
                <fieldset class=\"form__group\">
                    <legend class=\"form__label\">{$this->getLabel()} <span class=\"required\">{$requiredLabel}</span></legend>
                    $checkboxes
                    <p class=\"form__error\">{$this->getErrorMessage()}</p>
                </fieldset>
            ";
        }

        return "    
            <div class=\"form__group\">
                <label class=\"form__checkbox\" for=\"{$this->getName()}\">
                    <input type=\"checkbox\" name=\"{$this->getName()}\" id=\"{$this->getName()}\">
                    {$this->getLabel()} <span class=\"required\">{$requiredLabel}</span>
                    <span class=\"checkmark\"></span>
                </label>    
                    <p class=\"form__error\">{$this->getErrorMessage()}</p>
            </div>
        ";
    }

    /**
     * @return array|null
     */
    public function getChoices(): ?array
    {
        return $this->choices;
    }

    /**
     * @param array $choices
     *
     * @return $this
     */
    public function setChoices(array $choices): CheckboxType
    {
        $this->choices = $choices;

        return $this;
    }
}
