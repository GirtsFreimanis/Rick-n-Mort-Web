<?php

declare(strict_types=1);

namespace App;

use Carbon\Carbon;
use Dotenv\Dotenv;

class WeatherApi
{
    const API_URL = "https://api.openweathermap.org/data/2.5/weather?q=";
    private string $city;
    private float $temperature;

    public function __construct($city)
    {
        $dotenv = Dotenv::createImmutable("../");
        $dotenv->load();
        $apiKey = $_ENV["WEATHER_API_KEY"];
        $url = self::API_URL . $city . "&appid=" . $apiKey . "&units=metric";
        $data = file_get_contents($url);
        $result = json_decode($data);
        $this->city = $city;
        $this->temperature = round($result->main->temp);
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

}