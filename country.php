<?php
	include('db_connect.php');
	include('header_side.php');
?>

<html>
<body>

<div class="content">
<?php
	//get country id from URL 
  	$countryID = $_GET['id'];
	
	$collection = $db -> countries;
	
		//find a matching country
		$cursor = $collection->find();
		
		
		//{"country_name": "England" )}
		//echo '<u><big>Countries</u></big><br>';
		
		// iterate through the results
		foreach ($cursor as $obj) {
			if ($obj["country_id"] == $countryID) {
				echo "<h1><center>  " . $obj["country_name"] . "</h1></center>";
				//echo "<tr><td width = \"50%\" valign = \"top\">";
				echo "<table cellpadding = 5 width = \"100%\"><tr><td colspan = 2><p><H2>Info: </H2></p></td></tr>";
				echo "<tr><td><b>Capital City: </b></td><td>" . $obj["country_capital"] . "</td></tr>";
				//echo "<tr><td><b>Cities Featured <br/>on TravelGuide: </b></td><td>" . $featuredCityLinks . "</td></tr>";
				echo "<tr><td><b>Form of Government: </b></td><td>" . $obj["country_government"] . "</td></tr>";
				echo "<tr><td><b>Currency: </b></td><td>" . $obj["country_currency"] . "</td></tr>";
				echo "<tr><td><b>Population: </b></td><td>" . $obj["country_population"] . " people </td></tr>";
				echo "<tr><td><b>Area: </b></td><td>" . $obj["country_area"] . " km<sup>2</sup>" . "</td></tr>";
				echo "<tr><td><b>Official or National <br/>Language(s): </b></td><td>" . $obj["country_official_language"] . "</td></tr>";
				echo "<tr><td><b>Official or Majority <br/>Religion(s): </b></td><td>" . $obj["country_religion"] . "</td></tr></table>";
				//echo "<tr><td><b>Website: </b></td><td>" . ($obj["country_website"] != 'N/A' ? "<a href = \" $website \"> $website </a>" : $obj["country_website"]) . "</td></tr>";
				//echo "</td><td><img src = \"" . $obj["country_map"] . "\" alt = \"map\" width = \"100%\" align = \"right\"/></td></tr></table>";
			}
		}
?>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
