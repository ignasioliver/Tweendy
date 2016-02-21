<?php

$dbc = mysqli_connect('localhost', 'dev', '1234', 'Twenddy') OR die("Could not connect because: ".mysqli_connect_error());

mysqli_set_charset($dbc, "utf8");

?>