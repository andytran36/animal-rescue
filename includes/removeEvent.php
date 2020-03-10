<?php
include_once 'connectToDB.php';

	$eid = $_POST['eid'];

	$sql = "DELETE FROM EVENT
			WHERE event_id = '".$eid."';";
	
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");

?>
