<?php

include ('db_config.php');

$q1 = "SELECT id_country FROM countries";
$r1 = mysqli_query($dbc, $q1); 
$i = 0;
if ($r1) {
	$ans = array();
    while ($countries = mysqli_fetch_assoc($r1)) {
        $country_id = $countries["id_country"];
        $q2 = "SELECT c.name_country, t.id_country, c.flag, t.trend_name, t.trend_volume, c.top_pos, c.left_pos
        FROM trendings t, countries c WHERE c.id_country = t.id_country AND
        t.id_country = $country_id ORDER BY t.trend_volume DESC LIMIT 5";
        $r2 = mysqli_query($dbc, $q2);
        
        if ($r2) {
            for ($set = array (); $rows = mysqli_fetch_assoc($r2); $set[] = $rows);
            //echo $set;
            //print_r($set);
            if ($set !== null) {
            	$ans[$i] = $set;
			    ++$i;
			}  
        }
    }
    echo json_encode($ans);    
}

?>