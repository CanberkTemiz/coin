<?php

namespace App;

class Currency{
    public function request($method, $endpoint, $params){
        $client = new \GuzzleHttp\Client();

        $response = $client->request($method, $endpoint, $params);

        // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getBody(), true);
        $content = $content['data'];

        return $content;
    }
}
