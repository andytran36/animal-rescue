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
	$salary = $_POST['salary'];
	$species = $_POST['species'];

	$sql = "INSERT INTO MEMBER (`member_id`, `phone`, `fname`, `lname`, `minit`, `start_date`, `title`, `password`, `address`) 
			VALUES ('".$member_id."', '".$phone."', '".$fname."', '".$lname."', '".$minit."', '".$sdate."', 'Caretaker', '".$pass."', '".$address."') ;";
	mysqli_query($conn, $sql); 

	$sql = "INSERT INTO EMPLOYEE (`member_id`, `salary`)
			VALUES ('".$member_id."', '".$salary."') ;";
	mysqli_query($conn, $sql); 

	$sql = "INSERT INTO CARETAKER (`member_id`, `trained_species`)
			VALUES ('".$member_id."', '".$species."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
