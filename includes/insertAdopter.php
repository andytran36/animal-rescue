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

	$sql = "INSERT INTO MEMBER (`member_id`, `phone`, `fname`, `lname`, `minit`, `start_date`, `title`, `password`, `address`) 
			VALUES ('".$member_id."', '".$phone."', '".$fname."', '".$lname."', '".$minit."', CURRENT_DATE(), 'Potential Adopter', '".$pass."', '".$address."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
