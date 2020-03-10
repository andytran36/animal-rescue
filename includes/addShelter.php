<?php
include_once 'connectToDB.php';

// <!-- fname, minit, lname, member_id, password, address, phone, start_date, title, address -->
	$sno = $_POST['sno'];
	$type = $_POST['type'];
	$width = $_POST['width'];
	$height = $_POST['height'];
	$length = $_POST['length'];

	$sql = "INSERT INTO SHELTER (`shelter_no`, `shelter_type`, `last_cleaned`, `width`, `height`, `length`)
			VALUES ('".$sno."', '".$type."', CURRENT_DATE(), '".$width."', '".$height."', '".$length."') ;";
	mysqli_query($conn, $sql);

	header("Location:../pages/adminMainPage.php");
?>
