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
		$collection = $db->countries;
	
		//find any matching countries
		$regexObj = new MongoRegex("/.*$termSearched.*/");
		$query = array("country_name" => $regexObj);

		$cursor = $collection->find($query);

		
		//Countries header
		echo '<u><font size = 5>Countries</u></font><br><br/>';
		echo "<font size = 3>";
		
		//iterate through the results
		//print results - country flag and name as link to country page
		foreach ($cursor as $obj) {
			echo "<a href=country.php?id=".$obj["country_id"] . " >"
					. "<img src = \"" .$obj["country_flag"] . "\" alt = \"pic\" width = \"25%\" />"
					. "<br/><b>" . $obj["country_name"] . "</b></a><br/><br/>";
		}
		echo "</font>";
		
		
	
	} 
	// else if the type is of city, then look and see if the term searched is similar to any of the city names
	elseif ($type == 'city') {
		$collection = $db -> cities;
		
		//find any matching cities
		$regexObj = new MongoRegex("/.*$termSearched.*/");
		$query = array("city_name" => $regexObj);

		$cursor = $collection->find($query);
		
		//Cities header
		echo '<u><font size = 5>Cities</u></font><br><br/>';
		echo "<font size = 3>";
		
		//iterate through the results
		//print results - city photo and name as link to city page
		foreach ($cursor as $obj) {
			echo "<a href=city.php?id=".$obj["city_id"] . " >"
					. "<img src = \"" .$obj["city_picture"] . "\" alt = \"pic\" width = \"25%\" />"
					. "<br/><b>" . $obj["city_name"] . "</b></a><br/><br/>";
		}
		echo "</font>";
	} 



						
?>
</div>

<?php
   
   echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

   include('footer.php');
?>

</body>
</html>
