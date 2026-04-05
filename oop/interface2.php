<?php

namespace Interface2;

interface GetInfo
{
    public function getInfo(): string;
}

class Address implements GetInfo
{
    protected string $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getInfo(): string
    {
        return $this->address;
    }
}

class WebSite implements GetInfo
{
    protected string $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getInfo(): string
    {
        return file_get_contents($this->url);
    }
}

function printInfo(GetInfo $site)
{
    echo $site->getInfo();
}

$address = new Address('Calle 123');
printInfo($address);

$webSite = new WebSite('http://hdeleon.net');
printInfo($webSite);
