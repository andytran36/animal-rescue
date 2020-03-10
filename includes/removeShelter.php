<?php
include_once 'connectToDB.php';

	$sno = $_POST['sno'];

	$sql = "DELETE FROM SHELTER
			WHERE shelter_no = '".$sno."';";
	
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");

?>
