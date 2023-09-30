<?php 
namespace frontend\widgets\WeatherForecast\Data;
class OpenApiCoordinatesData implements CoordinatesDataInterface {

    protected $_lat;
    protected $_lon;

    public function __construct(float $lat, float $lon)
    {
        $this->_lat = $lat;
        $this->_lon = $lon;    
    }

    public function getLat():float {
        return $this->_lat;
    }

    public function getLon():float {
        return $this->_lon;
    }
}