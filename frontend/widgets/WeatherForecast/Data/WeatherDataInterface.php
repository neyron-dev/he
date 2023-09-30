<?php

namespace frontend\widgets\WeatherForecast\Data;

interface WeatherDataInterface
{
    public function __construct(
        float $dailyTemperature,
        float $afternoonTemperature,
        float $nightTemperature,
        float $eveningTemperature,
        float $morningTemperature
    );

    public function getDailyTemperature(): string;
    public function getAfternoonTemperature(): string;
    public function getNightTemperature(): string;
    public function getEveningTemperature(): string;
    public function getMorningTemperature(): string;
}
