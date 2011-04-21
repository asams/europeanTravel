<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>




<div class="content">
<h1>Comments we've received from our viewers:</h1>

<table rules = rows>

<?php


	//get the general comments that we've received from users	
	$collection = $db -> comments;
	$cursor = $collection -> find();
	
	
	foreach ($cursor as $obj) {
		$name = $obj["name"];
		$subject = $obj["subject"];
		$comment = $obj["comment"];
		$date_submitted = $obj["date"];
		echo "<tr><td><br/>Name: " . $name . "<br/><br/>Subject: " . $subject . "<br/><br/>Comment: " . $comment . "<br/><br/>Date: " . $date_submitted . "<br/><br/></td></tr>";
	
	}
	
?>

</table>

<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</h2>


</div>

<?php
   include('footer.php');
?>


</body>
</html>