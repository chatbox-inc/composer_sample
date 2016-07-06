<?php
require __DIR__."/../vendor/autoload.php";

use Carbon\Carbon;

echo "<pre>";

// Section1
// 本日の日付を拾得
$now = Carbon::now();
echo "本日の日付は {$now->format("Y-m-d")}です。".PHP_EOL;
// subDayで減算が出来る。
echo "1000日前は {$now->subDay(1000)->format("Y-m-d")} です。".PHP_EOL;

// Section2
// 誕生日を作成
$birthDay = Carbon::createFromFormat("Y-m-d","1986-12-04");
// 今年の誕生日を作成
$birthDayInThisYear = $birthDay->copy()->year(2016);
// isFuture で未来の判定も出来る
if($birthDayInThisYear->isFuture()){
    echo "今年の誕生日はまだ来ていません。".PHP_EOL;
}else{
    echo "今年の誕生日はもう来ました。".PHP_EOL;
}
echo "あなたの年齢は{$birthDay->age}才です。".PHP_EOL;

echo "</pre>";
