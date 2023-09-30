<?php 
namespace frontend\widgets\WeatherForecast\Helpers;

use frontend\widgets\WeatherForecast\Data\CoordinatesDataInterface;

interface RequestCoordinatesInterface {
    public function __construct(string $city, string $apiKey);

    public function getData():CoordinatesDataInterface;
}