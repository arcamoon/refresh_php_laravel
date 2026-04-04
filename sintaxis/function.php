<?php

function hi(string $name)
{
    echo "Hola $name";
}

function add(int $a, int $b)
{
    $result = $a + $b;
    return $result;
}

hi("Anibal");
hi("Rodrigo");

$res = add(1, "aasd");
echo "Resultado: $res";
