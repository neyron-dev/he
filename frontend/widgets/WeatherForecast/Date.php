<?php 
namespace frontend\widgets\WeatherForecast;

use frontend\widgets\WeatherForecast\Exceptions\InvalidDataException;

class Date implements DateInterface {

    protected string $_date;

    public function __construct(string $date)
    {
        if(!preg_match("#^\d{4}-\d{2}-\d{2}$#",$date))
            throw new InvalidDataException("Error");

        $this->_date = $date;
    }

    public function get():string {
        return $this->_date;
    }
}