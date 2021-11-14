<?php

namespace Product;

class PieceProduct implements Product
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
        return $this->price ?? null;
    }
}