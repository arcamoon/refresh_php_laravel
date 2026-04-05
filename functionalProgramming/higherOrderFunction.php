<?php

$const = 5;

$some = function (float $a, float $b) use ($const): float {
    return $a + $b + $const;
};

$sum = fn(float $a, float $b) => $a + $b;

function mul(float $a, float $b)
{
    return $a * $b;
}

function show(callable $fn, int $a, int $b)
{
    echo $fn($a, $b);
}

echo show($some, 4, 2);
