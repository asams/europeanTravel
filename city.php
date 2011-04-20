<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>
<div class="content">

<?php
	//get city ID from URL
	$cityID = $_GET['id'];
	$collection = $db -> cities;
		
		//find a matching city
		$cursor = $collection->find();
		
		// iterate through the results
		foreach ($cursor as $obj) {
			if (($obj["city_id"]) == $cityID) {
			
				$countryID = $obj["country_id"];
				$cityName = $obj["city_name"];
				
				//find country
				$collection2 = $db -> countries;
				$cursor2 = $collection2-> find();
				
				foreach ($cursor2 as $obj2){
					if (($obj2["country_id"]) == $countryID){
						$countryName = $obj2["country_name"];
					}					
				}
			
				echo "<H1><font size = 8><b>" . $obj["city_name"] . "</b></font></H1>";
				echo "<table>";
				echo "<tr><td width = \"40%\" valign = \"top\">";
				echo "<table width = \"100%\" cellpadding = 5 style = \"font-size: 13pt;\"><tr><td colspan = 2><p><H2>Info: </H2></p></td></tr>";
				echo "<tr><td><b>Country: </b></td><td>" . "<a href = \"country.php?id=" . $obj["country_id"] . "\"> $countryName </a>" . "</td></tr>";
				echo "<tr><td><b>City: </b></td><td>" . $obj["city_name"] . "</td></tr>";
				echo "<tr><td><b>Region: </b></td><td>" . $obj["city_region"] . "</td></tr>";
				echo "<tr><td><b>Population: </b></td><td>" . $obj["city_population"] . " people </td></tr>";
				echo "<tr><td><b>Website: </b></td><td>" . "<a href = ".$obj["city_website"] . " >" . $obj["city_website"] . "</a></td></tr>\n";
				echo "</table></td>";
				echo "<td><img src = \"" . $obj["city_picture"] . "\" alt = \"pic\" width = \"100%\" align = \"right\"/></td></tr>";
				echo "<tr><td colspan = 2><br/><br/><br/><center><img src = \"" . $obj["city_map"] . "\" alt = \"pic\" width = \"65%\" /></td></center></tr>";
				echo "</table>";
			}
		}

	
?>

<br/><br/><br/><br/>
<h1>Comments for <?php echo $cityName ?> : </h1><br/>

<br/><br/>
<form action="cityCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th><big>Name:</th><td><input type="text" id="name" name="name" size =75 /></td></tr>
<tr><th><big>Subject:</th><td><input type="text" id="subject" name="subject" size =75px /></td></tr>
<tr><th><big>Comment:</th><td><textarea name="comment" id="comment" rows = "4" ></textarea></td></tr>
<input type="hidden" name="city_id" value= <?php echo $cityID ?> />
<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

</table>
</center>
</form>

<br/><br/><br/>
<h1>Comments we've received from our viewers:</h1>

<table rules = rows>

<?php


	//get the general comments that we've received from users	
	$collection = $db -> city_comments;
	$cursor = $collection -> find();
	
	foreach ($cursor as $obj) {
		if (($obj["city_id"]) == $cityID) {
			$cityID = $obj["city_id"];
			$name = $obj["name"];
			$subject = $obj["subject"];
			$comment = $obj["comment"];
			$date_submitted = $obj["date"];
			echo "<tr><td><br/>Name: " . $name . "<br/><br/>Subject: " . $subject . "<br/><br/>Comment: " . $comment . "<br/><br/>Date: " . $date_submitted . "<br/><br/></td></tr>";
		}
	}

?>
</table>
</div>

<?php
   include('footer.php');
?>


</html>
</body>