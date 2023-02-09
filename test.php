<?php
include ("vendor/autoload.php");
for ($i = 1; $i <= 20; $i++) {
    $url = "socks5://127.0.0.1:90".(50+$i);
    echo "- Checking proxy: $url".PHP_EOL;
    try{
        $client = new \GuzzleHttp\Client();
        $res = $client->get('http://jsonip.com/',[
            'proxy' => [
                'http'  => $url, // Use this proxy with "http"
                'https' => $url, // Use this proxy with "https",
            ]
        ]);
        echo "Status code: {$res->getStatusCode()}";
        print_r(json_decode($res->getBody()->getContents(),1));

    }catch (\Exception $e){
        echo "Error:".PHP_EOL;
        print_r($e->getMessage());
    }

}