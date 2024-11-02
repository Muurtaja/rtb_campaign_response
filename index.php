<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


include 'libs/RTBHandler.php';


$campaignData   = file_get_contents(__DIR__ . '/data/campaigns.json');
$campaigns      = json_decode($campaignData, true);


$handler        = new RTBHandler($campaigns);
$bidRequestJson = file_get_contents('php://input');

echo $handler->handleRequest($bidRequestJson);
