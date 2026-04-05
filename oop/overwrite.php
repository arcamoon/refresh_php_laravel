<?php

class Discount
{
    protected float $discount = 0;

    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(float $price)
    {
        echo "Se aplica el salto de linea <br>";
        return $price * $this->discount;
    }
}

class SpecialDiscount extends Discount
{
    public const SPECIAL_DISCOUNT = 2;

    public function getDiscount(float $price)
    {
        echo "Se aplica un descuento especial <br>";

        return $price * $this->discount * self::SPECIAL_DISCOUNT;
    }
}

$specialDiscount = new SpecialDiscount(0.1);
echo $specialDiscount->getDiscount(100);
