<?php
include_once 'connectToDB.php';

	$member_id = $_POST['member_id'];
	$event_id = $_POST['event_id'];

	$sql = "DELETE FROM WORKS
			WHERE member_id = '".$member_id."' AND event_id = '".$event_id."';";
	mysqli_query($conn, $sql); 

	$sql = "SELECT * FROM MEMBER WHERE member_id = '".$member_id."' ;";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		if($row['title'] == "Veterinarian"){
			header("Location:../pages/veterinarianMainPage.php");
		}
		else if ($row['title'] == "Caretaker") {
			header("Location:../pages/caretakerMainPage.php");
		}
	}
?>
