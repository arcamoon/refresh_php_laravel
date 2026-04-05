<?php

$beer = new stdClass();

$beer->name = "Erdinger";
$beer->alcohol = 8.5;

$arr = (array) $beer;

echo gettype($arr);

$arrLocation = [
    "address" => "Calle del mal # 15",
    "country" => "México",
];

$objLocation = (object) $arrLocation;

print_r($objLocation);
