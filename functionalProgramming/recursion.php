<?php

function show($n)
{
    if ($n < 1) {
        return;
    }

    echo "Hola " . $n . "<br>";
    show($n - 1);
}

show(10);
