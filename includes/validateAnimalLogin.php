<?php
session_start();
include_once 'connectToDB.php';

	$user = $_POST['animalID'];
	//$_SESSION['memberID'] = $user;
	//$_SESSION['passID'] = $pass;
	echo($user);

	$sql = "SELECT * 
			FROM rescue.animal as a
			WHERE a.animal_id='".$user."';";

	//WHERE m.member_id='".$user."'AND m.password='".$pass."';";
	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result) == 1){
		while($row = mysqli_fetch_assoc($result)){
					//$jobTitle = ;
					$_SESSION['animalID'] = $row["animal_id"];
					header("Location:../pages/animalMainPage.php");
		}
	}
	else{
		echo "Cant";
		header("Location:../pages/loginPage.php");
	}
?>