<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$shelter_no = $_POST['shelter_no'];

	$sql = "INSERT INTO CLEANS (`shelter_no`, `member_id`, `cleaning_date`)
			VALUES ('".$shelter_no."', '".$member_id."', CURRENT_DATE()) ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/volunteerMainPage.php");
?>
