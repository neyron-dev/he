<?php

namespace frontend\widgets\WeatherForecast\Providers;

use DateTime;
use frontend\widgets\WeatherForecast\Data\WeatherData;
use frontend\widgets\WeatherForecast\Data\WeatherDataInterface;
use frontend\widgets\WeatherForecast\Date;
use frontend\widgets\WeatherForecast\Helpers\OpenApiRequest;
use frontend\widgets\WeatherForecast\Helpers\OpenApiRequestWeather;
use frontend\widgets\WeatherForecast\Helpers\Request;
use frontend\widgets\WeatherForecast\Helpers\RequestCoordinatesInterface;
use frontend\widgets\WeatherForecast\WeatherProviderInterface;
use Yii;

class OpenWeatherApiProvider implements WeatherProviderInterface
{

    const DAY_SUMMARY_URL = "https://api.openweathermap.org/data/3.0/onecall/day_summary";
    protected string $_apiKey;
    protected RequestCoordinatesInterface $_coordinatesRequest;

    public function __construct()
    {
        $this->_apiKey = Yii::$app->params['openWeatherApiKey'];
    }

    public function getApiKey() {
        return $this->_apiKey;
    }

    public function getForecast(float $lat, float $lon, DateTime $date, $units = "metric", $lang = "en"): WeatherDataInterface
    {

        $params = [
            "lat" => $lat,
            "lon" => $lon,
            "date" => $date->format("Y-m-d"),
            "units" => $units,
            "lang" => $lang,
            "appid" => $this->_apiKey
        ];

        $url = static::DAY_SUMMARY_URL . "?" . http_build_query($params);

        $response = new OpenApiRequestWeather($url);

        return $response->getData();
    }
}
