<?php 

declare(strict_types=1);

namespace App;

class ApiCallHandler
{

    public function execute(
        string $apiUrl, 
    ) : array {

        $ch = curl_init();

        $defaultConfig = [
          CURLOPT_URL => $apiUrl,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false
      ];

        curl_setopt_array($ch, $defaultConfig);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $errorMessage = 'Curl error: ' . curl_error($ch);
            $data = [
              'response' => null, 
              'errorMessage' => $errorMessage
            ];
            return $data; 
        }

        curl_close($ch);
        
        $data = [
          'response' => json_decode($response, true)
        ];

        return $data;

    }
  
}
