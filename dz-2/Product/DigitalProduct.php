<?php

namespace Product;
require_once 'Product.php';

class DigitalProduct implements Product
{

    protected string $title;
    protected float $price;

    public function __construct(string $title, float $price)
    {

        $this->title = $title;
        $this->price = $price;
    }

    function getPrice(): ?float
    {

        return $this->price / 2 ?? null;
    }
}