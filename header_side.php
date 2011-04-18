<?php
	//get logged-in user id from cookie/session
	session_start();
	$user_id = $_SESSION['user_id'];
 
if( isset($_COOKIE['user_id'])){
	$user_id = $_COOKIE['user_id'];
}
else{
	setcookie(user_id, $_SESSION['user_id'], time()+60*60*24);
}
   include('db_connect.php');
?>

<?php
	$collection = $db -> countries;
	
	//find a matching country
	$cursor = $collection->find();
	$countryCount = 0;
	// iterate through the results
	foreach ($cursor as $obj) {
		$countryCount++;
		
	}
	
	 $collection = $db -> cities;
	
	//find a matching country
	$cursor = $collection->find();
	$cityCount = 0;
	// iterate through the results
	foreach ($cursor as $obj) {
		
		$cityCount++;
		
	}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>~Travel Guide~</title>
<link rel="shortcut icon" href="picks/globe-fav.gif" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link href="1.css" type="text/css" rel="stylesheet" />


</head>
<body>

<?php
//search bar:
?>
<div class="container">
<div id="banner"> 
<div align="right"><form action="search.php" method="post" class="searchform">

<select name="type">
	<option class="group" value="city">City</option>
	<option class="group" value="country">Country</option>
</select>
<input type="text" id="searchq" name="searchedFor" />
<input type="submit" class="formbutton" value="Search" />
</form>
</div>
<div class="logo-2"><i>ETG</i></div>
<div class="logo-1"><img src="picks/logo.jpg"  style="border:0px" width=155%></div>





</div>

<?php
//left navigation bar:
?>
<div id="left">


<?php
//link to home:
?>
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;font-color:#000;font-size:14px;font-weight:bold;padding-left:1px;"><a href="index.php">HOME</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold; font-style: italic;
 letter-spacing: 2px;
 padding-left:1px;">Back to Main</span>
</div></div>





<?php
//country count and link:
?>
<div class="nav-box2">
<div class="s3">
</div>
<div class="s4">
</div>
<div class="nav-box-text2">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="countries.php">COUNTRIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  font-style: italic;letter-spacing: 2px;
 padding-left:1px;">Total: <?php echo $countryCount . '<br>';

/** $query = "SELECT country_name, country_id FROM countries ORDER BY country_name"; 
//$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$countryName = $row['country_name'];
	$countryID = $row['country_id'];
						


        //echo "<li><i><a href=\"country.php?id=$countryID\"> 

	echo '<a href=country.php?id=' . $countryID . '>' . $countryName . '</a><br>';

}
**/

		$collection = $db -> countries;
	
		//find a matching country
		$cursor = $collection->find();
		
		// iterate through the results
		foreach ($cursor as $obj) {
			echo "<a href=country.php?id=".$obj["country_id"] . " >" . $obj["country_name"] . "</a><br>";
			
		}

?>






</span>
</div></div>


<?php
//cities link and city count:
?>
<div class="nav-box2">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text2">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="cities.php">CITIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  font-style: italic; letter-spacing: 2px;
 padding-left:1px;">Total: <?php echo $cityCount ?>

 <?php
 $collection = $db -> cities;
	
	//find a matching country
	$cursor = $collection->find();
	
	// iterate through the results
	foreach ($cursor as $obj) {
		
		echo "<br><a href=city.php?id=".$obj["city_id"] . " >" . $obj["city_name"] . "</a>";
		
	}

?>
 </span>
</div></div>



<?php
//about us link:
?>
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;font-color:#000;font-size:14px;font-weight:bold;padding-left:1px;"><a href="aboutUs.php">ABOUT US</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold; font-style: italic;
 letter-spacing: 2px;
 padding-left:1px;">Who We Are?</span>
</div></div>


<?php
//contact us link:
?>
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="contactUs.php">CONTACT US</a></span>
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  font-style: italic; letter-spacing: 2px;
 padding-left:1px;">Suggestions?</span>
</div></div>

</div>

