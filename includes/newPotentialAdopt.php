<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];

	$sql = "INSERT INTO POTENTIAL_ADOPTER (`member_id`, `animal_id`)
			VALUES ('".$member_id."', '".$animal_id."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/potential_adopterMainPage.php");
?>
