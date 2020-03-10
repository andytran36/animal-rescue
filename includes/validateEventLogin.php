<?php
session_start();
include_once 'connectToDB.php';

	$user = $_POST['eventID'];
	//$_SESSION['memberID'] = $user;
	//$_SESSION['passID'] = $pass;
	echo($user);

	$sql = "SELECT * 
			FROM rescue.event as e
			WHERE e.event_id='".$user."';";

	//WHERE m.member_id='".$user."'AND m.password='".$pass."';";
	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result) == 1){
		while($row = mysqli_fetch_assoc($result)){
					//$jobTitle = ;
					$_SESSION['eventID'] = $row["event_id"];
					header("Location:../pages/eventMainPage.php");
		}
	}
	else{
		echo "Cant";
		header("Location:../pages/loginPage.php");
	}
?>