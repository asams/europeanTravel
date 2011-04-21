<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>

<?php
	//get the submitted values	
	$nameSubmitted = strip_tags($_POST['name']);
	$subjectSubmitted = strip_tags($_POST['subject']);
	$commentSubmitted = strip_tags($_POST['comment']);
	$date = getdate();
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

	
	$collection = $db -> comments;
	//$cursor = $collection -> find();


	//if all fields are completed, then insert the comment into the table
	if (($nameSubmitted !="") AND ($subjectSubmitted !="") AND ($commentSubmitted !="")){

		$obj = array("name"=>$nameSubmitted, "subject"=>$subjectSubmitted, "comment"=>$commentSubmitted, "date"=>$timestamp);
		
		$collection->insert($obj);
	
	
	
	
	
?>




<div class="content">

<center>
<h1>Thanks for your comment!</h1>

<h2>We're always glad to hear from you!<br/>We'll review your comment and see what we can do! <br/><br/>

<?php
	//one of the fields must have been empty, therefore, an error message is displayed
	} else {
?>
		<div class="content">
		
		<h2><center>Your comment was not sent. You did not fill in all of the fields.<br/> Please revisit <a href="contactUs.php">this page</a>. <br>
<?php
	}
?>

Want to see what other people have said?  <br/>View all the comments we've received <a href = "comments.php">here</a>.
</center>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></center>
</h2>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
