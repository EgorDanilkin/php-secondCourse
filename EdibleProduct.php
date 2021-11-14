<?php

require_once("Product.php");

class EdibleProduct extends Product
{

    private int $dateManufactureInUnix;
    private int $expirationDateInDays;

    public function __construct(
        $title,
        $price,
        $dateManufactureInUnix,
        $expirationDateInDays,
        $description = 'no description'
    ) {
        parent::__construct($title, $price, $description);
        $this->dateManufactureInUnix = $dateManufactureInUnix;
        $this->expirationDateInDays = $expirationDateInDays;
    }

    /**
     * @return int
     */
    public function getDateManufactureInUnix(): int
    {
        return $this->dateManufactureInUnix;
    }

    /**
     * @param int $dateManufactureInUnix
     */
    public function setDateManufactureInUnix(int $dateManufactureInUnix): void
    {
        $this->dateManufactureInUnix = $dateManufactureInUnix;
    }

    /**
     * @return int
     */
    public function getExpirationDateInDays(): int
    {
        return $this->expirationDateInDays;
    }

    /**
     * @param int $expirationDateInDays
     */
    public function setExpirationDateInDays(int $expirationDateInDays): void
    {
        $this->expirationDateInDays = $expirationDateInDays;
    }

    /**
     * @return bool
     */
    public function checkExpirationDate(): bool
    {
        return (($this->dateManufactureInUnix + $this->expirationDateInDays*24*60) > time());
    }

    /**
     * @return string
     */
    public function getLastDayExpirationDate(): string
    {
        return date('d-m-y',
            $this->dateManufactureInUnix + $this->expirationDateInDays*24*60*60);
    }
}