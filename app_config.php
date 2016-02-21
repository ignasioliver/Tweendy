<?php

require_once('TwitterAPIExchange.php');

//prueba_albert11
$settings = array(
    'oauth_access_token' => "256511588-BiwTfT6SehtVwK7gLdMKP08lsnPUsq3iNQqXAfOo",
    'oauth_access_token_secret' => "nkVAjJh7Nkv3URm24rKCJ9DDzFjCn7mQPam9rj18MQXx5",
    'consumer_key' => "4wI6b7uZcRU4HYxqtHalCfgAu",
    'consumer_secret' => "RQFAB0y4M8qJUYzUBUxPRvlDTXqdARdFd4t5E69EqU1VilHiFb"
);

//Twenddy
$settings2 = array(
    'oauth_access_token' => "256511588-PeLP8VKwtcTJPYH6peugeCows5FYQZj20IMwvFRz",
    'oauth_access_token_secret' => "gs3ZRvrX6fWPLfkW2shn7Tp0TakGl7eJvOn8SHexkRPDz",
    'consumer_key' => "TvJe8ZK3HYN3rUEbHWIdSW5Zq",
    'consumer_secret' => "inZ6DLVYVilwTudL4mQNFxWGnEiSpUueaOYVqpxU2PceQrabcA"
);

//prueba_albert22
$settings3 = array(
    'oauth_access_token' => "256511588-ZFXdyECPJipvfOvBRbUOWAltUc8MsjdfzxHi1iuI",
    'oauth_access_token_secret' => "qIJkVWGBRebtnI5OENUnhfhBeMCzFbu0prU0Dy1qlCdSe",
    'consumer_key' => "RWVs1P1tdfkPEo5xG2p7qOM0C",
    'consumer_secret' => "tz3prvIGjSJdFVCcppowGi759dmNT1dubpqKjP5LtDqj4jAerl"
);

//prueba_albert33
$settings4 = array(
    'oauth_access_token' => "256511588-ozIWTZqQmw3wPSB51XxiUS5sYDSxLRlebF21awVZ",
    'oauth_access_token_secret' => "LtcKSwBuVneFqF8QWfi3rOJzPSp3ANUz7vWRmAt6uOEzd",
    'consumer_key' => "GVixAunrdeJdJysmgKLpwz5E8",
    'consumer_secret' => "mHcqCkZt5ixL6k0NJRZvCX7W5WoQkJxTEToG0BpZyrgeu2rzrx"
);

//prueba_albert44
$settings5 = array(
    'oauth_access_token' => "256511588-gjNNa1H1uaRoUGwmzPmWUpUvYJ4m3UXH67MIqDEl",
    'oauth_access_token_secret' => "YJvpZULjIRGHG0SDfybS1OiDLpk4D7SH94wUpxZLPViwV",
    'consumer_key' => "CfXvXqoYg6G4gXDZ1MJQxXgx7",
    'consumer_secret' => "MQ4HaAsX735U7WwLA45WYNkT4FZ2ycMVnK9nXq4NZJHFEsqDsl"
);

$url = 'https://api.twitter.com/1.1/trends/place.json';
$twitter = new TwitterAPIExchange($settings);
$twitter2 = new TwitterAPIExchange($settings2);
$twitter3 = new TwitterAPIExchange($settings3);
$twitter4 = new TwitterAPIExchange($settings4);
$twitter5 = new TwitterAPIExchange($settings5);

$requestMethod = 'GET';

?>