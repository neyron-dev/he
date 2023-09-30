<?php

namespace frontend\widgets\WeatherForecast\Data;

use frontend\widgets\WeatherForecast\Helpers\TemperatureFormatter;

class WeatherData implements WeatherDataInterface
{

    protected $_dailyTemp;
    protected $_afternoonTemp;
    protected $_nightTemp;
    protected $_eveningTemp;
    protected $_morningTemp;

    public function __construct(
        float $dailyTemperature,
        float $afternoonTemperature,
        float $nightTemperature,
        float $eveningTemperature,
        float $morningTemperature
    ) {
        $this->_dailyTemp = $dailyTemperature;
        $this->_afternoonTemp = $afternoonTemperature;
        $this->_nightTemp = $nightTemperature;
        $this->_eveningTemp = $eveningTemperature;
        $this->_morningTemp = $morningTemperature;
    }

    public function getDailyTemperature(): string
    {
        return TemperatureFormatter::format($this->_dailyTemp);
    }

    public function getAfternoonTemperature(): string
    {
        return TemperatureFormatter::format($this->_afternoonTemp);
    }

    public function getNightTemperature(): string
    {
        return TemperatureFormatter::format($this->_nightTemp);
    }

    public function getEveningTemperature(): string
    {
        return TemperatureFormatter::format($this->_eveningTemp);
    }

    public function getMorningTemperature(): string
    {
        return TemperatureFormatter::format($this->_morningTemp);
    }
}
