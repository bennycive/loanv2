<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SmService
{
    protected $client;
    protected $apiUrl = 'https://messaging-service.co.tz/api/sms/v1/text/single';
    protected $apiKey = 'YmVubnljaXZlOkJlbm55QGNvZGVyMQ=='; // Replace with your actual API key
    protected $senderId = 'Afrigotech';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendSms($phoneNumber, $message)
    {
        $data = [
            'from' => $this->senderId,
            'to' => $phoneNumber,
            'text' => $message,
            'reference' => "aswqetgcv",
        ];

        $headers = [
            'Authorization' => 'Basic ' . $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        try {
            $response = $this->client->post($this->apiUrl, [
                'headers' => $headers,
                'json' => $data,
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody();

            if ($statusCode >= 200 && $statusCode < 300) {
                return ['success' => true, 'response' => $body];
            } else {
                return ['success' => false, 'response' => $body, 'http_code' => $statusCode];
            }
        } catch (RequestException $e) {
            $error = $e->getMessage();
            if ($e->hasResponse()) {
                $error = $e->getResponse()->getBody()->getContents();
            }

            \Log::error('Failed to send SMS: ' . $error);
            return ['success' => false, 'error' => $error];
        }
    }
}
