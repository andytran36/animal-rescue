<?php
session_start();
include_once 'connectToDB.php';

	$user = $_POST['shelterID'];
	//$_SESSION['memberID'] = $user;
	//$_SESSION['passID'] = $pass;
	echo($user);

	$sql = "SELECT * 
			FROM rescue.shelter as s
			WHERE s.shelter_no='".$user."';";

	//WHERE m.member_id='".$user."'AND m.password='".$pass."';";
	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result) == 1){
		while($row = mysqli_fetch_assoc($result)){
					//$jobTitle = ;
					$_SESSION['shelterID'] = $row["shelter_no"];
					header("Location:../pages/shelterMainPage.php");
		}
	}
	else{
		echo "Cant";
		header("Location:../pages/loginPage.php");
	}
?>