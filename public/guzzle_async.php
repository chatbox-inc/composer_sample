<?php
require __DIR__."/../vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$client = new GuzzleHttp\Client();
$langs = [
    "php","ruby","python","java","scala",
    "node","android","iphone","html","javascript",
    "css","go","クラウド","IoT"
];

$promises = [];

foreach ($langs as $lang) {
    $url = "http://connpass.com/api/v1/event/?keyword=$lang&ym=201506&count=100";
    $promise = $client->requestAsync('GET', $url);
    $promise->then(function($res)use($lang){
        if($res->getStatusCode() !== 200){
            echo "Request Failed";
            exit;
        }
        $body = json_decode($res->getBody(),true);
        $count = count($body["events"]);
        echo "<h2> $lang のイベント  $count 件</h2>";
//        foreach ($body["events"] as $event) {
//            echo "<a href='{$event["event_url"]}'>{$event["title"]}</a>";
//            echo "<br/>";
//        }
    });
//    $promise->wait();
    $promises[] = $promise;
}
Promise\all($promises)->wait();

