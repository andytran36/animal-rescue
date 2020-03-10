<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$animal_id = $_POST['animal_id'];
	$date = $_POST['date'];

	$sql = "DELETE FROM TREATS
			WHERE member_id = '".$member_id."' AND animal_id = '".$animal_id."' AND treat_date = '".$date."' ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/veterinarianMainPage.php");

?>
