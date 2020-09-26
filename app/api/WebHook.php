<?php

require("../Initialize.php");

use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Event\BaseEvent;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

if(!isset($_GET["id"])){
  http_response_code(400);
  exit();
}

$isVailedUser = false;

foreach($config["user"] as $u){
  if($u->id == $_GET["id"]){
    $isVailedUser = true;
    $user = $u;
  }
}

if(!$isVailedUser){
  http_response_code(400);
  exit();
}

$bot = new LINEBot(
  new CurlHTTPClient($user->channelToken),[
    "channelSecret" => $user->channelSecret
  ]
);

$signature = $_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE];

try{
  $events = $bot->parseEventRequest(file_get_contents("php://input"), $signature);
} catch(Exception $e) {
  http_response_code(400);
  exit();
}

foreach ($events as $event) {
  if(!($event instanceof BaseEvent)){
    continue;
  }
  if($event instanceof MessageEvent){
    
  }
}
