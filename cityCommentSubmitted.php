<?php
	header('Location: city.php?id=' . $_POST['city_id']);
	include('header_side.php');
	include('db_connect.php');

	$cityIDSubmitted = $_POST['city_id'];
	$nameSubmitted = $_POST['name'];
	$subjectSubmitted = $_POST['subject'];
	$commentSubmitted = $_POST['comment'];
	$date = getdate();
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

				
				
	$collection = $db -> city_comments;

	//if all fields are completed, then insert the comment into the table
	if (($nameSubmitted !="") AND ($subjectSubmitted !="") AND ($commentSubmitted !="")){

		$obj = array("city_id"=>$cityIDSubmitted, "name"=>$nameSubmitted, "subject"=>$subjectSubmitted, "comment"=>$commentSubmitted, "date"=>$timestamp);
		
		$collection->insert($obj);
	}
	
	
	
	//$userID = $_COOKIE['user_id'];
	//$subject = mysqli_real_escape_string($db, strip_tags(trim($subjectSubmitted)));
	//$comment = mysqli_real_escape_string($db, strip_tags(trim($commentSubmitted)));
	

	//if all the fields are completed, then insert the new comment into the cities' comments table
	//if (($userID != "") AND ($subject != "") AND ($comment != "")){

		//$query = "INSERT INTO city_comments (`city_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) 
			//		VALUES ('$commentCity', '$userID', '$subject', '$comment', '$timestamp')";
	
		//$result = mysqli_query($db, $query) or die ("Error Querying Database");
		//mysqli_close($db);	

	//}
?>



