<?php

use Wechat\Official\Official;

require_once("vendor/autoload.php");

$official = new Official([
    'appId' => ''
]);

$code = '3232';
$token = $official->getOauthAccessToken($code);

var_dump($token);