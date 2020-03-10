<?php
include_once 'connectToDB.php';

// <!--event_id`, `event_location`, `event_type`, `event_date`, `sponsors` -->
	$id = $_POST['eid'];
	$loc = $_POST['elocation'];
	$type = $_POST['etype'];
	$date = $_POST['edate'];
	$spons = $_POST['esponsors'];

	$sql = "INSERT INTO EVENT (`event_id`, `event_location`, `event_type`, `event_date`, `sponsors`) 
			VALUES ('".$id."', '".$loc."', '".$type."', '".$date."', '".$spons."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
