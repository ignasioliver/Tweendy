<?php

include('db_config.php');
/*
$countries = [[23424738,"United Arab Emirates"],[23424740,"Algeria"],[23424747,"Argentina"],[23424748,"Australia"],[23424750,"Austria"],[23424753,"Bahrain"],[23424757,"Belgium"],[23424765,"Belarus"],[23424768,"Brazil"],[23424775,"Canada"],[23424782,"Chile"],[23424787,"Colombia"],[23424796,"Denmark"],[23424800,"Dominican Republic"],[23424801,"Ecuador"],[23424802,"Egypt"],[23424803,"Ireland"],[23424819,"France"],[23424824,"Ghana"],[23424829,"Germany"],[23424833,"Greece"],[23424834,"Guatemala"],[23424846,"Indonesia"],[23424848,"India"],[23424852,"Israel"],[23424853,"Italy"],[23424856,"Japan"],[23424860,"Jordan"],[23424863,"Kenya"],[23424868,"Korea"],[23424870,"Kuwait"],[23424873,"Lebanon"],[23424874,"Latvia"],[23424898,"Oman"],[23424900,"Mexico"],[23424901,"Malaysia"],[23424908,"Nigeria"],[23424909,"Netherlands"],[23424910,"Norway"],[23424916,"New Zealand"],[23424919,"Peru"],[23424922,"Pakistan"],[23424923,"Poland"],[23424924,"Panama"],[23424925,"Portugal"],[23424930,"Qatar"],[23424934,"Philippines"],[23424935,"Puerto Rico"],[23424936,"Russia"],[23424938,"Saudi Arabia"],[23424942,"South Africa"],[23424948,"Singapore"],[23424950,"Spain"],[23424954,"Sweden"],[23424957,"Switzerland"],[23424960,"Thailand"],[23424969,"Turkey"],[23424975,"United Kingdom"],[23424976,"Ukraine"],[23424977,"United States"],[23424982,"Venezuela"],[23424984,"Vietnam"],];

for ($i = 0; $i < 62; ++$i) {
	$id = $countries[$i][0];
	$name = $countries[$i][1]; 
	$q = "INSERT INTO countries (id_country, name_country, flag) VALUES ('$id', '$name', 'img/');";
	//echo $q;
	$r = mysqli_query($dbc, $q);
}
*/

include('app_config.php');
include('db_config.php');

$i = 0;
$q1 = "DELETE FROM trendings";
$r1 = mysqli_query($dbc, $q1); 
if ($r1) {
	$q2 = "SELECT id_country FROM countries";
	$r2 = mysqli_query($dbc, $q2); 
	if ($r2) {
	    while ($countries = mysqli_fetch_assoc($r2)) {
	    	$country_id = $countries["id_country"];
	        $getfield = '?id='.$country_id;
	        if ($i < 14) {
	            $jsonraw = $twitter->setGetfield($getfield)
	                        ->buildOauth($url, $requestMethod)
	                        ->performRequest();    
	        }
	        else if ($i < 27) {
	            $jsonraw = $twitter2->setGetfield($getfield)
	                        ->buildOauth($url, $requestMethod)
	                        ->performRequest();
	        }
	        else if ($i < 40) {
	            $jsonraw = $twitter3->setGetfield($getfield)
	                        ->buildOauth($url, $requestMethod)
	                        ->performRequest();
	        }
	        else if ($i < 53) {
	            $jsonraw = $twitter4->setGetfield($getfield)
	                        ->buildOauth($url, $requestMethod)
	                        ->performRequest();
	        }
	        else {
	            $jsonraw = $twitter5->setGetfield($getfield)
	                        ->buildOauth($url, $requestMethod)
	                        ->performRequest();
	        }
	        $json = json_decode($jsonraw);
	        $trends = $json[0]->trends;
		    foreach($trends as $trend) {
			    $name = $trend->name;
			    $volume = $trend->tweet_volume;
				echo $country_id.' '.$name.' '.$volume;
				if ($volume > 0) {
					$q = "INSERT INTO trendings (id_country, trend_name, trend_volume) VALUES ('$country_id', '$name', '$volume');";
					$r = mysqli_query($dbc, $q);
				    if ($r) {
				    	 echo "All right<br/>";
				    }
					else echo "error :(";					
				}
		    }
		    ++$i;
	    }
	}
}


?>