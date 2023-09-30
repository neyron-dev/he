<?php

namespace frontend\widgets\WeatherForecast\Data;

interface CoordinatesDataInterface
{
    public function __construct(float $lat, float $lon);

    public function getLat(): float;
    public function getLon(): float;
}
