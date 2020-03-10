<?php
include_once 'connectToDB.php';

	$animal_id = $_POST['aid'];

	$sql = "DELETE FROM ANIMAL
			WHERE animal_id = '".$animal_id."';";
	
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");

?>
