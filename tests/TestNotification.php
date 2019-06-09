<?php

require __DIR__.'/../src/OneSignal.php';
use Youssef\OneSignal\OneSignal;
$appId = "";
$appKey = "";

$notification = new OneSignal($appId,$appKey);
$notification->logo = 'https://cascocode.com/storage/services/system-update.png';
$notification->heading = ["en"=>"Test Buttons"];
$notification->appUrl = 'https://google.com';
$notification->url = 'https://google.com';
$notification->content = ["en"=>"52% Discount For New Clients"];
echo $notification->sendToAll()."\n";
