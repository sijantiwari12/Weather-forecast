<?php
namespace App\ForecastServiceWeather;
use Symfony\Component\HttpClient\HttpClient;

class ApiWeatherGov {
    /**
     * parse the given weather API and return data on success.
     * @param $url
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getWeatherFromApi($url) :array {
        $data = [];
        $client = HttpClient::create();
        $response = $client->request('GET', $url);
        $content = $response->getContent();
        $data['status_code'] = $response->getStatusCode();
        $data['content'] = json_decode($content, JSON_PRETTY_PRINT);
        return $data;
    }
}