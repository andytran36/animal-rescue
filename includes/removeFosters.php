<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];

	$sql = "DELETE FROM FOSTERS
			WHERE member_id = '".$member_id."' AND animal_id = '".$animal_id."' ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/fosterMainPage.php");

?>
