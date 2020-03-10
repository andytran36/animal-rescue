<?php
include_once 'connectToDB.php';

// <!-- fname, minit, lname, member_id, password, address, phone, start_date, title, address -->
	$fname = $_POST['fname'];
	$minit = $_POST['minit'];
	$lname = $_POST['lname'];
	$member_id = $_POST['member_id'];
	$pass = $_POST['password'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$sdate = $_POST['start_date'];
	$training = $_POST['training'];

	$sql = "INSERT INTO MEMBER (`member_id`, `phone`, `fname`, `lname`, `minit`, `start_date`, `title`, `password`, `address`) 
			VALUES ('".$member_id."', '".$phone."', '".$fname."', '".$lname."', '".$minit."', '".$sdate."', 'Volunteer', '".$pass."', '".$address."') ;";
	mysqli_query($conn, $sql); 

	if ($training === "1") {
		$sql = "INSERT INTO VOLUNTEER (`member_id`, `training_status`)
				VALUES ('".$member_id."', '".$training."') ;";
	}
	else {
		$sql = "INSERT INTO VOLUNTEER (`member_id`, `training_status`)
				VALUES ('".$member_id."', '0') ;";
	}
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
