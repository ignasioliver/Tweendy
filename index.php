<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="scripts.js"></script>
	</head>
	<body style="background-color:#d8d8d8;">
		<div id="content" style="position: relative;">

			<?php
			include ('db_config.php');
			
			$q1 = "SELECT name_country FROM countries";
			$r1 = mysqli_query($dbc, $q1); 
			
			while ($country = mysqli_fetch_assoc($r1)) {
				$name_country = $country["name_country"];
				$name_country = str_replace(' ','',$name_country);
				$name_country = strtolower($name_country);
				for ($i = 0; $i < 5; ++$i) {
					echo '<div style="border-radius:100%; position: absolute;" id="'.$name_country.$i.'"></div>';
				}
			}		
		?>	
		</div> 
</body>	
</html>
<?php include('footer.php'); ?>

