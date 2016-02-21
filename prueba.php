<?php

include ('db_config.php');
/*
$countries = [[23424738,"United Arab Emirates"],[23424740,"Algeria"],[23424747,"Argentina"],[23424748,"Australia"],[23424750,"Austria"],[23424753,"Bahrain"],[23424757,"Belgium"],[23424765,"Belarus"],[23424768,"Brazil"],[23424775,"Canada"],[23424782,"Chile"],[23424787,"Colombia"],[23424796,"Denmark"],[23424800,"Dominican Republic"],[23424801,"Ecuador"],[23424802,"Egypt"],[23424803,"Ireland"],[23424819,"France"],[23424824,"Ghana"],[23424829,"Germany"],[23424833,"Greece"],[23424834,"Guatemala"],[23424846,"Indonesia"],[23424848,"India"],[23424852,"Israel"],[23424853,"Italy"],[23424856,"Japan"],[23424860,"Jordan"],[23424863,"Kenya"],[23424868,"Korea"],[23424870,"Kuwait"],[23424873,"Lebanon"],[23424874,"Latvia"],[23424898,"Oman"],[23424900,"Mexico"],[23424901,"Malaysia"],[23424908,"Nigeria"],[23424909,"Netherlands"],[23424910,"Norway"],[23424916,"New Zealand"],[23424919,"Peru"],[23424922,"Pakistan"],[23424923,"Poland"],[23424924,"Panama"],[23424925,"Portugal"],[23424930,"Qatar"],[23424934,"Philippines"],[23424935,"Puerto Rico"],[23424936,"Russia"],[23424938,"Saudi Arabia"],[23424942,"South Africa"],[23424948,"Singapore"],[23424950,"Spain"],[23424954,"Sweden"],[23424957,"Switzerland"],[23424960,"Thailand"],[23424969,"Turkey"],[23424975,"United Kingdom"],[23424976,"Ukraine"],[23424977,"United States"],[23424982,"Venezuela"],[23424984,"Vietnam"],];

for ($i = 0; $i < 62; ++$i) {
	$id = $countries[$i][0];
	
	$url = "http://maps.google.com/maps/api/geocode/json?address=";
	$country = str_replace(' ', '', $countries[$i][1]);
	$jsonraw = file_get_contents($url.$country);
	$json = json_decode($jsonraw);
	$top = ((90-$json->results[0]->geometry->location->lat)*100)/180;
	$left = (($json->results[0]->geometry->location->lng+180)*100)/360;
	
	echo $country.' '.$top.' '.$left.'<br/>';
	
	$q = "UPDATE countries SET top_pos = '$top', left_pos = '$left' WHERE countries.id_country = $id;";
	$r = mysqli_query($dbc, $q);
}

$q1 = "SELECT id_country FROM countries";
$r1 = mysqli_query($dbc, $q1); 
$i = 0;
if ($r1) {
	$ans = array();
    while ($countries = mysqli_fetch_assoc($r1)) {
        $country_id = $countries["id_country"];
        $q2 = "SELECT c.name_country, t.id_country, c.flag, t.trend_name, t.trend_volume FROM trendings t, countries c WHERE t.id_country = c.id_country AND t.id_country = $country_id ORDER BY t.trend_volume DESC LIMIT 5";
        $r2 = mysqli_query($dbc, $q2);
        
        if ($r2) {
            for ($set = array (); $rows = mysqli_fetch_assoc($r2); $set[] = $rows);
            //echo $set;
            //print_r($set);
            $ans[$i] = $set;
			++$i;  
        }
    }    
}

print_r(json_encode($ans));
*/

$q1 = "SELECT name_country FROM countries";
$r1 = mysqli_query($dbc, $q1); 

while ($country = mysqli_fetch_assoc($r1)) {
	$name_country = $country["name_country"];
	for ($i = 0; $i < 5; ++$i) {
		echo '<div style="border-radius:100%; position:absolute;" id="'.$name_country.$i.'"></div>';
	}
}


?>