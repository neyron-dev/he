<?php
namespace frontend\widgets\WeatherForecast;

use DateTime;
use frontend\widgets\WeatherForecast\Data\WeatherDataInterface;

interface WeatherProviderInterface {
    public function getForecast(float $lat, float $lon, DateTime $date, $units="metric", $lang="en"):WeatherDataInterface;

    public function getApiKey();
}