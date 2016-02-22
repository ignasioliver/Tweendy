<?php

require_once('TwitterAPIExchange.php');

//prueba_albert11
$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

//Twenddy
$settings2 = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

//prueba_albert22
$settings3 = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

//prueba_albert33
$settings4 = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

//prueba_albert44
$settings5 = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => """
);

$url = 'https://api.twitter.com/1.1/trends/place.json';
$twitter = new TwitterAPIExchange($settings);
$twitter2 = new TwitterAPIExchange($settings2);
$twitter3 = new TwitterAPIExchange($settings3);
$twitter4 = new TwitterAPIExchange($settings4);
$twitter5 = new TwitterAPIExchange($settings5);

$requestMethod = 'GET';

?>
