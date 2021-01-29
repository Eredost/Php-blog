<?php

namespace Blog\Models\Traits;

use http\Exception\InvalidArgumentException;

trait TimestampableTrait
{
    /** @var string $createdAt */
    private $createdAt;

    /** @var string $updatedAt */
    private $updatedAt;

    /**
     * List the names of the months and their abbreviations in French
     *
     * @var array[] $monthNames
     */
    private $monthNames = [
        ['Janvier', 'Janv'],
        ['Février', 'Févr'],
        ['Mars', 'Mars'],
        ['Avril', 'Avr'],
        ['Mai', 'Mai'],
        ['Juin', 'Juin'],
        ['Juillet', 'Juill'],
        ['Août', 'Août'],
        ['Septembre', 'Sept'],
        ['Octobre', 'Oct'],
        ['Novembre', 'Nov'],
        ['Décembre', 'Déc'],
    ];

    /**
     * Returns the name of the month corresponding to the date
     *
     * @param string $property The property containing the date where you want to retrieve the name of the month
     * @param bool   $abbr     Defined if the name of the month is abbreviated or not
     *
     * @return string
     * @throws \Exception
     */
    public function getMonthName(string $property = 'createdAt', bool $abbr = false): string
    {
        if (!property_exists($this, $property)) {

            throw new InvalidArgumentException('Vous devez fournir une propriété valide de la classe');
        }
        $monthNumber = (new \DateTime($this->$property))->format('n');
        $isAbbr = ($abbr ? 1 : 0);

        return $this->monthNames[$monthNumber][$isAbbr];
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
