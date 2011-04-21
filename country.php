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
	
	$collection = $db -> cities;
	$cursor2 = $collection -> find();
	$featuredCityLinks = "<ul>";
	
	foreach ($cursor2 as $obj2) {
		if ($obj2["country_id"] == $countryID) {
			$featuredCityLinks = $featuredCityLinks . "<li><a href = \"city.php?id=" . $obj2["city_id"] . "\">" . $obj2["city_name"] . "</a></li>";
		}
	}
	
	$featuredCityLinks = $featuredCityLinks . "</ul>";
			
	
	$collection = $db -> countries;
	
		//find a matching country
		$cursor = $collection->find();
		
		
		//{"country_name": "England" )}
		//echo '<u><big>Countries</u></big><br>';
		
		// iterate through the results
		foreach ($cursor as $obj) {
			if ($obj["country_id"] == $countryID) {
				echo ($obj["country_flag"] != 'N/A' ? "<img src = \"" . $obj["country_flag"] . "\" alt = \"flag\" width = 100 align = \"top\"/>" : "");
				//echo "<h1><center>  " . $obj["country_name"] . "</h1></center>";
				echo "<font size=8 ><b>" . "  " . $obj["country_name"] . "</b></font>";
				
				//echo "<tr><td width = \"50%\" valign = \"top\">";
				echo "<table cellpadding = 5 ><tr><td colspan = 2><H2><u>Info</u>: </H2></td></tr>";
				echo "<tr><td><table>";
				echo "<tr><td><font size=3> <b>Capital City: </b><br/><br/></td><td><font size=3>" . $obj["country_capital"] . "<br/><br/></td></tr>";	
				echo "<tr><td><font size=3><b>Cities Featured <br/>on TravelGuide: </b><br/><br/></td><td><font size=3>" . $featuredCityLinks . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Form of Government: </b><br/><br/></td><td><font size=3>" . $obj["country_government"] . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Currency: </b><br/><br/></td><td><font size=3>" . $obj["country_currency"] . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Population: </b><br/><br/></td><td><font size=3>" . $obj["country_population"] . " people <br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Area: </b><br/><br/></td><td><font size=3>" . $obj["country_area"] . " km<sup>2</sup>" . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Official or National <br/>Language(s): </b><br/><br/></td><td><font size=3>" . $obj["country_official_language"] . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Official or Majority <br/>Religion(s): </b><br/><br/></td><td><font size=3>" . $obj["country_religion"] . "<br/><br/></td></tr>";
				echo "<tr><td><font size=3><b>Website: </b><br/><br/></td><td><font size=3>" . "<a href = ".$obj["country_website"] . " >" . $obj["country_website"] . "</a><br/><br/></td></tr>";
				//echo "<tr><td><b>Website: </b></td><td>" . ($obj["country_website"] != 'N/A' ? "<a href = \" $obj[\"country_website\"]> $obj[\"country_website\"] </a>" : $obj["country_website"]) . "</td></tr>";
				//echo "</table><br><br><center><table width=55% ><tr><td><img src = \"" . $obj["country_map"] . "\" alt = \"map\" width = \"100%\" align = \"right\"/></td></tr></table></center>";
				echo "</table></td><td><center><img src = \"" . $obj["country_map"] . "\" alt = \"map\" width = \"100%\" align = \"right\"/></td></tr></table></center>";
			}
		}
?>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
