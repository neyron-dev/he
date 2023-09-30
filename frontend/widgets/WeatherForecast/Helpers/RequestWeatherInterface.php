<?php 
namespace frontend\widgets\WeatherForecast\Helpers;

use frontend\widgets\WeatherForecast\Data\WeatherDataInterface;

interface RequestWeatherInterface {
    public function __construct(string $url);

    public function getData():WeatherDataInterface;
}