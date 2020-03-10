<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];
	$comment = $_POST['comment'];
	$duration = $_POST['duration'];

	$sql = "INSERT INTO FOSTERS (`member_id`, `animal_id`, `comment`, `duration`)
			VALUES ('".$member_id."', '".$animal_id."', '".$comment."', '".$duration."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/fosterMainPage.php");
?>
