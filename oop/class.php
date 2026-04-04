<?php

declare(strict_types=1);

namespace Sale;

class Sale
{
    public float $total;
    private string $date;
    private array $concepts;

    public static $count;

    public function __construct(string $fecha)
    {
        $this->total = 0;
        $this->date = $fecha;
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
        return "w";
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        if (strlen($date) > 10) {
            echo "La fecha es incorrecta";
        } else {
            echo "Fecha modificada exitosamente";
            $this->date = $date;
        }
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

class OnlineSale extends Sale
{
    public string $paymentMethod;

    public function __construct(string $fecha, string $paymentMethod)
    {
        parent::__construct($fecha);
        $this->paymentMethod = $paymentMethod;
    }

    public function showInfo(): string
    {
        return "La venta tiene un monto de $this->total";
    }
}


$sale = new Sale("02-10-2026");
echo gettype($sale);
print_r($sale);


print_r($sale);

$sale->createInvoice();
echo "<br>";
Sale::reset();
echo Sale::$count;

echo gettype($sale->total);

$concept = new Concept("descripcion", 100);
$concept2 = new Concept("cerveza 2", 20.23);

echo "<br>";
$onlineSale = new OnlineSale(date("Y-m-d"), "tarjeta");
$res = $onlineSale-> createInvoice();
print_r($onlineSale);

echo "<br>";
print($res);
$onlineSale->addConcept($concept);
$onlineSale->addConcept($concept2);
print_r($onlineSale);

echo "<br>";
echo $onlineSale->getDate();

$onlineSale->setDate("10/10/2010");
echo $onlineSale->getDate();
