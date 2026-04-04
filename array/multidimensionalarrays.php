<?php

$beers = [
    [
        "name" => "Erdinger",
        "alcohol" => 8.5,
        "country" => "Alemania",
    ],

    "nombre" => [
        "name" => "Erdinger 2",
        "alcohol" => 8.5,
        "country" => "Alemania",
    ],
];

// echo $beers["nombre"]["name"];

foreach ($beers as $beer) {
    foreach ($beer as $data) {
        echo $data;
    }
    echo "-";
}
