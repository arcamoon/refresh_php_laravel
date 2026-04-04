<?php

namespace SendInterface;

interface SendInterface
{
    public function send(string $message);
}

interface SaveInterface
{
    public function save(): void;
}

class Document implements SendInterface, SaveInterface
{
    public function send(string $message)
    {
        echo "Se envía la venta " . $message;
    }

    public function save(): void
    {
        echo "Se guarda la venta en la nube";
    }
}

class BeerRepository implements SaveInterface
{
    public function save(): void
    {
        echo "Se guarda en una BD";
    }
}

class SaveProcess
{
    private SaveInterface $saveManager;

    public function __construct($saveManager)
    {
        $this->saveManager = $saveManager;
    }

    public function keep()
    {
        echo "hacemos algo antes <br>";
        $this->saveManager->save();
    }
}

$beerRepository = new BeerRepository();
$document = new Document();

$saveProcess = new SaveProcess($beerRepository);
$saveProcess->keep();
