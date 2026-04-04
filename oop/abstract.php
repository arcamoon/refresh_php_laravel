<?php

namespace Product;

function showInfo(Product $product)
{
    echo "$ " . $product->calculatePrice();
}

abstract class Product
{
    protected float $price;
    protected string $name;

    abstract public function calculatePrice(): float;

    public function getName(): string
    {
        return $this->name;
    }
}


class Beer extends Product
{
    public const TAX = 1.1;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculatePrice(): float
    {
        return $this->price * Beer::TAX;
    }
}

$beer = new Beer("Delirium", 15);
echo $beer->getName();

showInfo($beer);
