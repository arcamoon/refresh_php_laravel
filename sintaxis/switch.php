<?php

$age = 2;
switch ($age) {
    case 1:
    case 2:
        echo 'tiene 1 año o 2 años';
        break;
    case 18:
        echo 'tiene 18 años';
        break;
    case 27:
        echo 'tiene 27 años';
        break;
    case 36:
        echo 'tiene 36 años';
        break;
    default:
        echo 'No se sabe que edad tiene';
        break;
}
