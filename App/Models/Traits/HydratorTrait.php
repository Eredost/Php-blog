<?php

namespace Blog\Models\Traits;

trait HydratorTrait
{
    /**
     * Used to hydrate an object
     *
     * @param array $data Array containing in key, the name of the property as well as its value
     */
    private function hydrate(array $data)
    {
        foreach ($data as $property => $value) {
            if (method_exists($this, 'set'.ucfirst($property))) {
                $this->{'set'.ucfirst($property)}($value);
            }
        }
    }
}
