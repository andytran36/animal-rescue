<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$shelter_no = $_POST['shelter_no'];
	$date = $_POST['date'];

	$sql = "DELETE FROM CLEANS
			WHERE member_id = '".$member_id."' AND shelter_no = '".$shelter_no."' AND cleaning_date = '".$date."' ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/volunteerMainPage.php");
?>
