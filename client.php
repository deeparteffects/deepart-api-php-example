<?php

require_once(__DIR__ . '/vendor/autoload.php');

$api_key = '--Your API KEY--';
$access_key = '--Your ACCESS KEY--';
$secret_key = '--Your SECRET KEY--';

$api_instance = new \Deeparteffects\Client\Api\DefaultApi();
$api_instance->setApiKey($api_key);
$api_instance->setApiAccessKey($access_key);
$api_instance->setApiSecretKey($secret_key);
