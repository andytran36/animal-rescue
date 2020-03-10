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
	$salary = $_POST['salary'];
	$status = $_POST['status'];

	$sql = "INSERT INTO MEMBER (`member_id`, `phone`, `fname`, `lname`, `minit`, `start_date`, `title`, `password`, `address`) 
			VALUES ('".$member_id."', '".$phone."', '".$fname."', '".$lname."', '".$minit."', CURRENT_DATE(), 'Foster', '".$pass."', '".$address."') ;";
	mysqli_query($conn, $sql); 

	$sql = "INSERT INTO FOSTER (`member_id`, `foster_status`)
			VALUES ('".$member_id."', '".$status."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
