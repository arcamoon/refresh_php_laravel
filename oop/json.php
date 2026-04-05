<?php

declare(strict_types=1);

namespace Beer;

class Beer
{
    public string $name;
    public string $brand;
    public float $alcohol;
    public bool $isStrong;
    public function __construct(string $name, string $brand, float $alcohol, bool $isStrong)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->alcohol = $alcohol;
        $this->isStrong = $isStrong;
    }
}

$beer = new Beer("Delirium Red", "Delirium", 8.5, true);

$json = json_encode($beer);
echo $json;
echo "<br>";

$jsonBeer = '{"name":"Delirium Red","brand":"Delirium","alcohol":8.5,"isStrong":true}';
$objBeer = json_decode($jsonBeer);

print_r($objBeer);
echo $objBeer->name;

echo "<br>";

$arr = [
    "name" => "Anibal",
    "country" => "México",
];


$newJson = json_encode($arr);

$newArray = json_decode($newJson, true);
print_r($newArray);
echo '<br>';

echo $newArray["country"];
