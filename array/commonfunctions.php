<?php

$beers = [
    "Carolus",
    "London Porter",
    "Delirium Red",
    "Corona",
];

$beers2 = [
    "Carolus 2",
    "London Porter 2",
    "Delirium Red 2",
    "Corona 2",
];

$beers[] = "1";
$values = ["2","Anibal"];
array_push($beers, ...$values);

array_pop($beers);

echo count($beers);

$beersMixed = array_merge($beers, $beers2);

print_r($beers);

echo"<br>";
print_r($beersMixed);

if (in_array("Corona", $beers)) {
    echo "existe";
} else {
    echo"no existe";
}
