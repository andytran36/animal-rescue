<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$event_id = $_POST['event_id'];
	$role = $_POST['role'];
	$hours = $_POST['hours'];

	$sql = "INSERT INTO VOLUNTEERS_AT (`member_id`, `event_id`, `role`, `hours`)
			VALUES ('".$member_id."', '".$event_id."', '".$role."', '".$hours."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/volunteerMainPage.php");
?>
