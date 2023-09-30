<?php 
namespace frontend\widgets\WeatherForecast\Helpers;

use frontend\widgets\WeatherForecast\Data\CoordinatesDataInterface;
use frontend\widgets\WeatherForecast\Data\OpenApiCoordinatesData;
use frontend\widgets\WeatherForecast\Exceptions\ApiCityErrorException;
use frontend\widgets\WeatherForecast\Exceptions\ApiUnknownException;

class OpenApiRequestCoordinates implements RequestCoordinatesInterface {

    protected OpenApiCoordinatesData $_data;
  
    CONST GET_COORD_URL = "http://api.openweathermap.org/geo/1.0/direct";

    public function __construct(string $city, string $apiKey)
    {
        $params = [
            "q" => $city,
            "appid" => $apiKey
        ];

        $url = static::GET_COORD_URL . "?" . http_build_query($params);
        $response = new Request($url);

        $responseData = $response->getData();
        if(empty($responseData) || empty($responseData[0]["lat"])) 
            throw new ApiCityErrorException(); 

        $this->_data = new OpenApiCoordinatesData($responseData[0]["lat"],$responseData[0]["lon"]);
    }

    public function getData(): CoordinatesDataInterface
    {
        return $this->_data;
    }
}