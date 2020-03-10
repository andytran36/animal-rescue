<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];
	$type = $_POST['type'];
	$duration = $_POST['duration'];

	$sql = "INSERT INTO TREATS (`member_id`, `animal_id`, `treat_type`, `treat_date`, `treat_duration`)
			VALUES ('".$member_id."', '".$animal_id."', '".$type."', CURRENT_DATE(), '".$duration."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/veterinarianMainPage.php");
?>
