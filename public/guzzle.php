<?php
require __DIR__."/../vendor/autoload.php";

use GuzzleHttp\Client;

$client = new GuzzleHttp\Client();
$url = 'http://connpass.com/api/v1/event/?keyword=php&count=100';
$res = $client->request('GET', $url);

if($res->getStatusCode() !== 200){
    echo "Request Failed";
    exit;
}

echo "<h2> PHP のイベント一覧 </h2>";

$body = json_decode($res->getBody(),true);
foreach($body["events"] as $event){
    echo "<a href='{$event["event_url"]}'>{$event["title"]}</a>";
    echo "<br/>";
}

