<?php
namespace App\DataLayer;

use App\Model\ApiTokenModel;

class ForecastDataLayer
{

    /**Get the usage count from db
     * @param $token
     * @return ApiTokenModel
     */
     public function getUsageCount(string $token) :ApiTokenModel {
         include __DIR__ . '/../../config/database.php';
         $conn = new \mysqli(SERVERNAME,USERNAME,PASSWORD,DB);
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         $weatherForecastModel = new ApiTokenModel();
         $sql = 'SELECT usage_count FROM auth WHERE token =' . "'$token'";
         $result = ($conn->query($sql));
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             $usageCount = (int)$row['usage_count'];
             $weatherForecastModel->usageCount = $usageCount;
         }
         $conn->close();
         return $weatherForecastModel;
     }

    /**
     * Update the user_count column in the db.
     * @param string $tokenValue
     * @throws \Exception
     */
     public function updateUserCount(string $tokenValue) {
         include __DIR__ . '/../../config/database.php';
         $conn = new \mysqli(SERVERNAME,USERNAME,PASSWORD,DB);
         $timezone = new \DateTimeZone('America/New_York');
         $dateTime = new \DateTime('now',  $timezone);
         $dateTime = $dateTime->format('Y-m-d H:i:s');
         $weatherForecastModel= new ApiTokenModel();
         $weatherForecastModel->lastUsedOn = $dateTime;
         $weatherForecastModel->tokenValue = $tokenValue;
         $weatherForecastModel->usageCount = $this->getUsageCount($tokenValue)->usageCount + 1;

         $sql = 'UPDATE auth SET usage_count=' .$weatherForecastModel->usageCount . ", last_used =" . "'$weatherForecastModel->lastUsedOn'" . ' WHERE token =' . "'$weatherForecastModel->tokenValue'";
         $conn->query($sql);
         $conn->close();
         }

         /**
          * checks if the token from request matches with the token in the db
          * @param $token
          * @return bool
          *
          */
         public function isTokenValid($token) :bool {
             include __DIR__ . '/../../config/database.php';
             $conn = new \mysqli(SERVERNAME,USERNAME,PASSWORD,DB);
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             $sql = 'SELECT token FROM auth WHERE token=' . "'$token'";
             $result = ($conn->query($sql));
             if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                 if ($token == $row['token']) {
                    return true;
                 }

             } else {
                return false;
             }
             $conn->close();
         }


 }
