<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Api;

class WeatherController
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api();
    }
    public function show():void{
        $city = $_GET['city'];
        var_dump($city);
    }
}