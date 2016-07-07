<?php
require __DIR__."/../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

session_start();

$count = isset($_SESSION["count"])?$_SESSION["count"]:1;

echo "Hello World <br/>";
echo "$count 回目のアクセスです。 <br/>";

$_SESSION["count"] = $count+1;

// create a log channel
$log = new Logger('logger');

$loglevel = Logger::DEBUG;
//$loglevel = Logger::ALERT; // より弱い出力
$path = __DIR__.'/../app.log';
$handler = new StreamHandler($handler, $loglevel);
$log->pushHandler($handler);

$log->debug("IPアドレスは、{$_SERVER["REMOTE_ADDR"]} です。");
$log->info("$count 回目のアクセスです。 ");
if($count > 10)
$log->error("10回以上のアクセスを受けています！");
