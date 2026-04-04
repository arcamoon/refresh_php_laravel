<?php

declare(strict_types=1);

namespace Sale;

class Sale
{
    public int $total;
    public string $fecha;
    public array $concepts;

    public static $count;

    public function __construct(int $total, string $fecha)
    {
        $this->total = $total;
        $this->fecha = $fecha;
        $this->concepts = [];
        self::$count++;
    }

    public function addConcept(Concept $concept)
    {
        array_push($this->concepts, $concept);
    }

    public static function reset()
    {
        self::$count = 0;
    }

    public function __destruct()
    {
        echo "Se ha eliminado el objeto";
    }

    public function createInvoice(): string
    {
        return "Se crea la factura";
    }
}

class Concept
{
    public string $description;
    public float $amount;

    public function __construct(string $description, float $amount)
    {
        $this->description = $description;
        $this->amount = $amount;
    }
}


$sale = new Sale(100, "02-10-2026");
echo gettype($sale);
print_r($sale);

$sale->total = 200;
$sale->fecha = "03/04/2025";

print_r($sale);

$sale->createInvoice();
echo "<br>";
Sale::reset();
echo Sale::$count;

echo gettype($sale->total);
