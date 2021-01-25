<?php

namespace Blog\Utils\Validators;

use Blog\Models\Traits\HydratorTrait;
use Blog\Utils\Request;

class ImageFileValidator extends Validator
{
    use HydratorTrait;

    /** @var string $inputName */
    private $inputName;

    /** @var string $maxSize */
    private $maxSize = '5000000';

    /** @var string $maxMessage */
    private $maxMessage = 'Le fichier est trop volumineux, celui-ci ne doit pas excéder %d Mo';

    /** @var string[] $acceptedMimeTypes */
    private $acceptedMimeTypes = ['image/jpeg', 'image/png'];

    /** @var string $mimeTypeMessage */
    private $mimeTypeMessage = 'Le format du fichier n\'est pas valide, les extensions de fichier qui sont acceptés : %s';

    /**
     * ImageFileValidator constructor.
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
        $files = (new Request())->getUploadedFiles();

        if (isset($files[$this->inputName])
            && !empty($files[$this->inputName]['name'])) {

            if ($files[$this->inputName]['size'] > $this->maxSize) {
                $this->setErrorMessage(sprintf($this->maxMessage, $this->maxSize / 1000000));
            } elseif (!in_array($files[$this->inputName]['type'], $this->acceptedMimeTypes)) {
                $this->setErrorMessage(sprintf($this->mimeTypeMessage, implode(', ', $this->acceptedMimeTypes)));
            }
        }

        return empty($this->getErrorMessage());
    }

    /**
     * @param string $inputName
     */
    public function setInputName(string $inputName)
    {
        $this->inputName = $inputName;
    }

    /**
     * @param string $maxSize
     */
    public function setMaxSize(string $maxSize)
    {
        $this->maxSize = $maxSize;
    }

    /**
     * @param string $maxMessage
     */
    public function setMaxMessage(string $maxMessage)
    {
        $this->maxMessage = $maxMessage;
    }

    /**
     * @param string[] $acceptedMimeTypes
     */
    public function setAcceptedMimeTypes(array $acceptedMimeTypes)
    {
        $this->acceptedMimeTypes = $acceptedMimeTypes;
    }

    /**
     * @param string $mimeTypeMessage
     */
    public function setMimeTypeMessage(string $mimeTypeMessage)
    {
        $this->mimeTypeMessage = $mimeTypeMessage;
    }
}
