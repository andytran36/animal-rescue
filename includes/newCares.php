<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];
	$duration = $_POST['duration'];

	$sql = "INSERT INTO CARES_FOR (`member_id`, `animal_id`, `care_date`, `care_duration`)
			VALUES ('".$member_id."', '".$animal_id."', CURRENT_DATE(), '".$duration."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/caretakerMainPage.php");
?>
