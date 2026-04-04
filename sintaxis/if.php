<?php

$age = 18;
if ($age >= 18) {
    echo "Eres mayor de edad";
} elseif ($age > 18 || $age < 60) {
    echo "Eres mayor a 18";
} elseif ($age >= 60) {
    echo "Eres una persona de tercera edad";
} else {
    echo "Eres mayor a 18";
}
