<?php
include_once 'connectToDB.php';

// <!-- fname, minit, lname, member_id, password, address, phone, start_date, title -->
	$fname = $_POST['fname'];
	$minit = $_POST['minit'];
	$lname = $_POST['lname'];
	$member_id = $_POST['member_id'];
	$title = $_POST['title'];
	$pass = $_POST['password'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$sdate = $_POST['start_date'];
	$salary = $_POST['salary'];

	$sql = "INSERT INTO MEMBER (`member_id`, `phone`, `fname`, `lname`, `minit`, `start_date`, `title`, `password`, `address`) 
			VALUES ('".$member_id."', '".$phone."', '".$fname."', '".$lname."', '".$minit."', '".$sdate."', '".$title."', '".$pass."', '".$address."') ;";
	mysqli_query($conn, $sql); 

	$sql = "INSERT INTO EMPLOYEE (`member_id`, `salary`)
			VALUES ('".$member_id."', '".$salary."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");


?>
