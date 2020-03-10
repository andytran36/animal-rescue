<?php
session_start();
include_once 'connectToDB.php';

	$user = $_POST['memberID'];
	$pass = $_POST['passID'];
	echo($user);
	echo($pass);

	$sql = "SELECT * 
			FROM rescue.member as m
			WHERE m.member_id='".$user."'AND m.password='".$pass."';";

	$result = mysqli_query($conn, $sql); 
	echo(mysqli_num_rows($result));
	if (mysqli_num_rows($result) == 1){
		while($row = mysqli_fetch_assoc($result)){
				if($row["title"] == "Admin"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/adminMainPage.php");
				}
				else if($row["title"] == "Veterinarian"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/veterinarianMainPage.php");
				}
				else if($row["title"] == "Caretaker"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/caretakerMainPage.php");
				}
				else if($row["title"] == "Volunteer"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/volunteerMainPage.php");
				}
				else if($row["title"] == "Potential Adopter"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/potential_adopterMainPage.php");
				}
				else if($row["title"] == "Foster"){
					$_SESSION['memberID'] = $row["member_id"];
					$_SESSION['passID'] = $row["password"];
					header("Location:../pages/fosterMainPage.php");
				}

		}
	}
	else{
		echo "Cant";
		header("Location:../pages/loginPage.php");
	}
?>