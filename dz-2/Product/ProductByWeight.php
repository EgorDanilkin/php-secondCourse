<?php

namespace Product;

class ProductByWeight implements Product
{

    protected string $title;
    protected float $price;
    protected float $weight;

    public function __construct(string $title, float $price, $weight)
    {

        $this->title = $title;
        $this->price = $price;
        $this->weight = $weight;
    }
    function getPrice(): ?float
    {
        return $this->price * $this->weight ?? null;
    }
}