<?php
namespace App\ForecastServiceWeather;

use App\DataLayer\ForecastDataLayer;
use Symfony\Component\HttpFoundation\Response;
class ForecastService {
    /** Consume the api_weather API and return the data to forecast route on ForecastController
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function weatherInfo() :array {
        $result = [];
        $apiWeatherService = new apiWeatherGov();
        $data = $apiWeatherService->getWeatherFromApi('https://api.weather.gov/gridpoints/TOP/31,80/forecast');
        if ($data['status_code'] == 200) {
            $periods = $data['content']['properties']['periods'];
            foreach ($periods as $period) {
                $result['periods'][] = [
                    'name' => $period['name'],
                    'startTime' => $period['startTime'],
                    'endTime' => $period['endTime'],
                    'temperature' => $period['temperature'],
                    'temperatureTrend' => $period['temperatureTrend'],
                    'icon' => $period['icon'],
                    'shortForecast' => $period['shortForecast'],
                ];
            }
            $result['status_code'] = Response::HTTP_OK;
            $content = json_encode($result);
            $result['content'] = $content;

            return $result;
        }
    }

    /** checks if the token from request is valid
     * @param $token
     * @return bool
     */
    public function isTokenValid($token = null) :bool {
        $dataLayer = new ForecastDataLayer();
        if (!empty($token)) {
            if ($dataLayer->isTokenValid($token)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

