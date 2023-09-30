<?php

namespace frontend\widgets\WeatherForecast\Helpers;

use frontend\widgets\WeatherForecast\Data\WeatherData;
use frontend\widgets\WeatherForecast\Data\WeatherDataInterface;
use frontend\widgets\WeatherForecast\Exceptions as ApiExceptions;
use yii\httpclient\Client;

class OpenApiRequestWeather implements RequestWeatherInterface
{
    private WeatherDataInterface $_data;

    public function __construct(string $url)
    {
        $response = new Request($url);

        $responseData = $response->getData();
        if(empty($responseData["temperature"]))
            throw new ApiExceptions\ApiUnknownException();

        $temperatureData = $responseData["temperature"];

        $dailyTemperature = ($temperatureData["min"] + $temperatureData["max"]) / 2;

        $this->_data = new WeatherData(
            $dailyTemperature,
            $temperatureData["afternoon"],
            $temperatureData["night"],
            $temperatureData["evening"],
            $temperatureData["morning"]
        );;
    }

    public function getData():WeatherDataInterface
    {
        return $this->_data;
    }
}
