<?php

namespace Sale;

class Sale
{
    public $total;
    public $fecha;

    public function __construct($total, $fecha)
    {
        $this->total = $total;
        $this->fecha = $fecha;
    }

    public function createInvoice()
    {
        echo "Se crea la factura";
    }
}


$sale = new Sale(100, "02-10-2026");
echo gettype($sale);
print_r($sale);

$sale->total = 200;
$sale->fecha = "03/04/2025";

print_r($sale);

$sale->createInvoice();
