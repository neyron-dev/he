<?php

namespace frontend\widgets\WeatherForecast;

use DateTime;
use frontend\widgets\WeatherForecast\Data\WeatherDataInterface;

final class ForecastDay
{
    private WeatherDataInterface $_weatherData;
    private DateTime $_date;

    public function __construct(WeatherDataInterface $weatherData, DateTime $date)
    {
        $this->_weatherData = $weatherData;
        $this->_date = $date;
    }

    public function getForecast(): WeatherDataInterface
    {
        return $this->_weatherData;
    }

    public function getLabel(): string
    {
        $dayNames = array(1 => "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
        
        return $dayNames[$this->_date->format('N')];
    }
}
