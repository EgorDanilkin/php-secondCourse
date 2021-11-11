<?php

class TechnicalProduct extends Product
{

    private array $specifications = [];

    public function __construct($title, $price, $specifications, $description = 'no description')
    {
        parent::__construct($title, $price, $description,);
        $this->specifications = $specifications;
    }

    /**
     * @return array
     */
    public function getSpecifications(): array
    {
        return $this->specifications;
    }

    /**
     * @param array $specifications
     */
    public function setSpecifications(array $specifications): void
    {
        $this->specifications = $specifications;
    }

    /**
     * @param string $requiredSpecification
     * @return mixed
     */
    public function getRequiredSpecification(string $requiredSpecification): mixed
    {
        if (array_key_exists($requiredSpecification, $this->specifications)) {
            return $this->specifications[$requiredSpecification];
        }

        return null;
    }

    /**
     * @param string $tileAddedSpecification
     * @param string $addedSpecification
     * @return bool
     */
    public function addSpecifications(string $tileAddedSpecification, string $addedSpecification): bool
    {
        if (!array_key_exists($tileAddedSpecification, $this->specifications)) {
            $this->specifications += [$tileAddedSpecification => $addedSpecification];

            return true;
        }

        return false;
    }

    /**
     * @param string $titleRemovableSpecification
     * @return bool
     */
    public function removeSpecification(string $titleRemovableSpecification): bool
    {
        if (array_key_exists($titleRemovableSpecification, $this->specifications)) {
            unset($this->specifications[$titleRemovableSpecification]);

            return true;
        }

        return false;
    }
}