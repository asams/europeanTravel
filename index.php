<?php

//if sourceDB.php file exists, then include sourceDB.php
//this is for our auto-install process
if(is_file("sourceTravelGuideDB.php")) {
	include("sourceTravelGuideDB.php");
	exit;
}
	include('header_side.php');
	include('db_connect.php');
?>

<html>
<body>

<div class="content">
<h1><center>Welcome to Our European TravelGuide!</center></h1>


<br><br>

<center><img src="picks/europeanTravel.jpg"></center>

<?php

	$int = 0;

	//select a random city name from the cities table
	//this city will be the site's featured city
	//$query = "SELECT city_name FROM cities ORDER BY RAND() LIMIT 1";
	//$result = mysqli_query($db, $query)or die("Error Querying Database");
	//$row = mysqli_fetch_array($result);
	//$featured = $row['city_name'];


?>

<?php
	/**

	//get the random city name's information
	$query = "SELECT * FROM cities WHERE city_name = '$featured'";
	//$query = "SELECT * FROM cities WHERE city_name = (SELECT city_name FROM cities ORDER BY RAND() LIMIT 1)";
	//echo $query . "<br/>";
	//$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	 while($row = mysqli_fetch_array($result)){
		$cityId = $row['city_id'];
		$cityName = $row['city_name'];
		$countryId = $row['country_id'];
		$region = $row['city_region'];
		$population = $row['city_population'];
		$cityMap = $row['city_map'];
		$flag = $row['city_flag'];
		$coatOfArms = $row['city_coat_of_arms'];
		$cityPicture = $row['city_pic'];
		$website = $row['city_website'];
	}
	//get the random city name's country
	$query = "SELECT country_name FROM countries WHERE country_id=$countryId";
	//echo $query;
	//$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	$row = mysqli_fetch_array($result);
	$countryName = $row['country_name'];
	

	//get the random city name's attractions
	$query = "SELECT attraction_name, attraction_id FROM attractions WHERE city_id = $cityId ORDER BY attraction_name";
	//$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	$attractionLinks = $attractionLinks . "</ul>";

?>

<?php
	//display all of the city's information
	echo "<center><h2>Featured City: " . $cityName . ', ' . $countryName . "</h2></center>";
	echo "<table cellpadding = 15 valign = top><tr><td width = \"50%\" valign = top>";
	echo ($cityPicture != 'N/A' ? "<br/><img src = \"" . $cityPicture . "\" alt = \"flag\" width = \"100%\"  border=\"2\" />" : "");
	echo "</td><td valign = top><p><H2>Info: </H2></p>";
	echo "Name: <a href = \"city.php?id=" . $cityId . "\">" . $cityName . "</a><br/><br/><br/>";
	echo "Region: " . $region . "<br/><br/><br/>";
	echo "Attractions Featured on TravelGuide: " . $attractionLinks . "<br/><br/>";
	echo "Population: " . $population . " people <br/><br/><br/>";
	echo "Website: <a href = \"" . $website . "\">" . $website . "</a><br/><br/><br/><br/><br/><br/></right></td></tr>";
	echo "</table>";
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
//	echo "<center>*If you have a suggestion for a better name than \"TravelGuide\", let us know on our ContactUs page!</center>";
//	echo "Session: " . $_SESSION['user_id'] . "   Cookie: " . $_COOKIE['user_id'];


**/
?>


</div>

<?php

   
   include('footer.php');
?>

</body>
</html>
