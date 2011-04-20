<?php
   include('header_side.php');
    include('db_connect.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of cities:</h1>
<?php

	$collection = $db -> cities;
	
	//find a matching country
	$cursor = $collection->find();
	
		
	//echo '<u><big><b>Cities</u></big><br>';
	
	//count the number of results printed
	$count = 0;
	
	//start table
	echo "<center><table width = \"90%\" cellpadding = 15>";
	
	// iterate through the results
	foreach ($cursor as $obj) {
		$count++;
		
		//echo "<a href=city.php?id=".$obj["city_id"] . " >" . $obj["city_name"] . "</a><br>";
		
		if($count % 4 == 1){
			echo "<tr valign = top>";
		}
		echo "<td width = \"25%\" align = center><a href=city.php?id=" .$obj["city_id"] . "><img src = \"" .$obj["city_picture"] 
				. "\" alt = \"pic\" width = \"100%\" />   ";
    	echo '<br/><b>' .$obj["city_name"] . '</b></a><br></td>';
		if ($count % 4 == 0){
			echo "</tr>";
		}
		
	}
	
	echo "</table>";
	echo "</b>";
	

?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
   include('footer.php');
?>

</body>
</html>
