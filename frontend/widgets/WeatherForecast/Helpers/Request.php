<?php

namespace frontend\widgets\WeatherForecast\Helpers;

use yii\httpclient\Client;
use frontend\widgets\WeatherForecast\Exceptions as ApiExceptions;

final class Request
{
    private array $_data;

    public function __construct($url)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setUrl($url)
            ->send();

        if (!$response->isOk) {
            $responseData = $response->getData();

            switch ($response->getStatusCode()) {
                case 400:
                    throw new ApiExceptions\ApiBadRequestException($responseData["message"]);
                    break;
                case 401:
                    throw new ApiExceptions\ApiUnauthorizedException($responseData["message"]);
                    break;
                case 429:
                    throw new ApiExceptions\ApiManyRequestsException($responseData["message"]);
                    break;
                default:
                    throw new ApiExceptions\ApiUnknownException();
            }
        } elseif ($response->getStatusCode() != 200) {
            throw new ApiExceptions\ApiBadRequestException();
        } elseif (empty($response->getData())) {
            throw new ApiExceptions\ApiUnknownException();
        }

        $this->_data = $response->getData();
    }

    public function getData():array {
        return $this->_data;
    }
}
