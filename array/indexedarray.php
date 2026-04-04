<?php

$names = ["Hector", "Juan", "Pedro"];

echo $names[2];

$names[] = "Ana";
echo var_dump($names);

foreach ($names as $value) {
    echo $value;
}
