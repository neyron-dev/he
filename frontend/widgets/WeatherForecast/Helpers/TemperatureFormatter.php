<?php

namespace frontend\widgets\WeatherForecast\Helpers;

final class TemperatureFormatter
{
    public static function format(float $temperature): string
    {
        $prefix = abs($temperature) > 0 ? "+" : "-";
        return $prefix . round($temperature, 0, PHP_ROUND_HALF_UP);
    }
}
