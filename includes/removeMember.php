<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];

	$sql = "DELETE FROM MEMBER
			WHERE member_id = '".$member_id."';";
	
	if ($member_id !== "111111111"){
		mysqli_query($conn, $sql); 
	}

	header("Location:../pages/adminMainPage.php");

?>
