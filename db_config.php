<?php

$dbc = mysqli_connect('', '', '', '') OR die("Could not connect because: ".mysqli_connect_error());

mysqli_set_charset($dbc, "utf8");

?>
