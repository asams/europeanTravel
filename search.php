<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>

<div class="content">
<h1>Search Results:</h1>
<?php

	//get the term that the user entered
	$termSearched = strip_tags(trim(trim($_POST['searchedFor'])));
	$type = $_POST['type'];
	//echo $type;

	//echo $termSearched;
	echo '<center>';


	//if the type is of country, then look and see if the term searched is similar to any of the country names
	if ($type == 'country') {
		$collection = $db -> countries;
	
		//find a matching country
		$cursor = $collection->find();
		
		
		//{"country_name": "England" )}
		echo '<u><big>Countries</u></big><br>';
		
		// iterate through the results
		foreach ($cursor as $obj) {
			if (strtolower($obj["country_name"]) == strtolower($termSearched)) {
				echo "<a href=country.php?id=".$obj["country_id"] . " >" . $obj["country_name"] . "</a>\n";
			}
		}
		
		
		
	
	} 
	// else if the type is of city, then look and see if the term searched is similar to any of the city names
	elseif ($type == 'city') {
		$collection = $db -> cities;
	
		//find a matching country
		$cursor = $collection->find();
		
		
		//{"country_name": "England" )}
		echo '<u><big>Cities</u></big><br>';
		
		// iterate through the results
		foreach ($cursor as $obj) {
			if (strtolower($obj["city_name"]) == strtolower($termSearched)) {
				echo "<a href=city.php?id=".$obj["city_id"] . " >" . $obj["city_name"] . "</a>\n";
			}
		}
	} 



						
?>
</div>

<?php
   
   echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

   include('footer.php');
?>

</body>
</html>
