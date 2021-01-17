<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;

class LengthValidator extends Validator
{
    use HydratorTrait;

    /** @var int $minLength */
    protected $minLength = 0;

    /** @var int $maxLength */
    protected $maxLength;

    /** @var string $minMessage */
    private $minMessage = 'Le champ doit contenir au minimum %d caractère(s)';

    /** @var string $maxMessage */
    private $maxMessage = 'Le champ doit contenir au maximum %d caractère(s)';

    /**
     * LengthValidator constructor.
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
        $value = trim($value);

        if (!empty($value)
            && strlen($value) < $this->minLength) {

            $this->setErrorMessage(sprintf($this->minMessage, $this->minLength));
        } elseif (!empty($value)
            && isset($this->maxLength)
            && $this->maxLength && strlen($value) > $this->maxLength) {

            $this->setErrorMessage(sprintf($this->maxMessage, $this->maxLength));
        }

        return empty($this->getErrorMessage());
    }

    /**
     * @param int $minLength
     */
    private function setMinLength(int $minLength)
    {
        if ($minLength < 0) {

            throw new \LogicException('The minimum length should be greater than 0');
        }
        $this->minLength = $minLength;
    }

    /**
     * @param int|null $maxLength
     */
    private function setMaxLength(?int $maxLength)
    {
        if ($maxLength && $maxLength < $this->minLength) {

            throw new \LogicException('The maximum length should be greater than the minimum length');
        }
        $this->maxLength = $maxLength;
    }

    /**
     * @param string $message
     */
    public function setMinMessage(string $message)
    {
        $this->minMessage = $message;
    }

    public function setMaxMessage(string $message)
    {
        $this->maxMessage = $message;
    }
}
