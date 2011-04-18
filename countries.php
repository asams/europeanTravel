<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>


<div class="content">
<h1>Here's a list of countries:</h1>
<h3>
<?php

	$collection = $db -> countries;
	
		//find a matching country
		$cursor = $collection->find();
		
		
		//{"country_name": "England" )}
		echo '<u><big>Countries</u></big><br>';
		
		// iterate through the results
		foreach ($cursor as $obj) {
			echo "<a href=country.php?id=".$obj["country_id"] . " >" . $obj["country_name"] . "</a><br>";
			
		}


//get each of the country's information from the table
$count = 0;
// echo "<center><table width = \"90%\" cellpadding = 15>";
// while($row = mysqli_fetch_array($result)) {
	// $count ++;
	// $countryName = $row['country_name'];
	// $countryID = $row['country_id'];
	// $countryFlag = $row['country_flag'];
	
					
	// if($count % 5 == 1){
		// echo "<tr valign = top>";
	// }

	// //display the info
	// echo "<td width = \"20%\" align = center><a href=country.php?id=" . $countryID . "><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100%\" /></a>   ";
	// echo "<br/><a href=country.php?id=" . $countryID . ">" . $countryName . "</a><br/><br/></td>";
	// if ($count % 5 == 0){
		// echo "</tr>";
	// }

// }
//echo "</table></center>";					
?>
</h3>
<br/><br/><br/>
</div>

<?php
   include('footer.php');
?>


</body>
</html>
