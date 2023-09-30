<?php

namespace frontend\widgets\WeatherForecast;

use DateTime;
use frontend\widgets\WeatherForecast\Data\WeatherData;
use frontend\widgets\WeatherForecast\Helpers\OpenApiRequestCoordinates;
use yii\base\Widget;
use yii\helpers\Html;

class WeatherForecast extends Widget
{

    public WeatherProviderInterface $weatherProvider;
    public string $city;

    private ForecastDayCollection $_forecastDayCollection;

    public function init()
    {
        parent::init();
        $this->_forecastDayCollection = new ForecastDayCollection();

        if (!empty($this->city)) {
            $cityResponse = new OpenApiRequestCoordinates($this->city, $this->weatherProvider->getApiKey());
            $today = new DateTime();

            $forecastCollection = new ForecastDayCollection();
            for ($i = 0; $i <= 6; $i++) {
                $weakDayDate =   $today->modify("+1 day");
                $weatherData = $this->weatherProvider->getForecast(
                    $cityResponse->getData()->getLat(),
                    $cityResponse->getData()->getLon(),
                    $weakDayDate
                );

                $forecastCollection->add(new ForecastDay($weatherData, clone ($weakDayDate)));
            }

            $this->_forecastDayCollection = $forecastCollection;
        }
    }

    public function run()
    {
        return $this->render('index', [
            "forecastCollection" => $this->_forecastDayCollection
        ]);;
    }
}
