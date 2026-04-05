<?php

// No modifican la entrega, y devuelven el mismo valor según las entradas siempre, por más tiempo que pase

class Counter
{
    public int $count = 0;
}

$counter = new Counter();

function show(Counter $counter): string
{
    $counter->count++;
    return $counter->count . "<br>";
}

function add(float $a, float $b): float
{
    return $a + $b;
}

echo show($counter);
echo show($counter);
echo show($counter);
echo show($counter);
echo show($counter);

echo $counter->count;
