<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$event_id = $_POST['event_id'];

	$sql = "DELETE FROM VOLUNTEERS_AT
			WHERE member_id = '".$member_id."' AND event_id = '".$event_id."';";
	mysqli_query($conn, $sql); 

	header("Location:../pages/volunteerMainPage.php");
?>
