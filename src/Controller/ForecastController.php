<?php
namespace App\Controller;
use App\ForecastServiceWeather\ForecastService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ForecastController extends AbstractController
{

    /**
     * Forecast controller that gets the incoming http request and returns response
     * @param Request $request
     * @return Response
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */

    public function forecast(Request $request): Response {
        $incomingToken = $request->headers->get('Api-Token');
        $foreCastService = new ForecastService();
        $response = new Response();
        if (!$foreCastService->isTokenValid($incomingToken)) {
            $response->setContent('You are not authorized to make this request. Use Valid token.');
            $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            return $response;
        } else {
            $weatherInfo = $foreCastService->weatherInfo();
            if ($weatherInfo['status_code'] == 200) {
                $foreCastService->updateUserCount($incomingToken);
                $weatherForecastModel = $foreCastService->getUsageCount($incomingToken);
                $usageCount = $weatherForecastModel->usageCount;
                $data = [
                    'usageCount' => $usageCount,
                    'content' => $weatherInfo['content'],
                ];
                $json = json_encode($data);
                $response->setContent($json);
                $response->setStatusCode($weatherInfo['status_code']);
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }
        }
    }
}
