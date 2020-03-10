<?php
include_once 'connectToDB.php';

	$name = $_POST['name'];
	$id = $_POST['aid'];
	$type = $_POST['atype'];
	$adate = $_POST['admit_date'];
	$age = $_POST['age'];
	$size = $_POST['size'];
	$weight = $_POST['weight'];
	$health = $_POST['health'];
	$sno = $_POST['shelter'];
	$sdate = $_POST['shelter_date'];
	$desc = $_POST['desc'];
	$sex = $_POST['sex'];
	$color = $_POST['color'];

	$sql = "INSERT INTO ANIMAL (`animal_id`, `shelter_no`, `name`, `age`, `size`, `weight`, `animal_type`, `health_status`, `description`, `admission_date`, `shelter_admit_date`, `gender`, `color`)
			VALUES ('".$id."', '".$sno."', '".$name."', '".$age."', '".$size."', '".$weight."', '".$type."', '".$health."', '".$desc."', '".$adate."', '".$sdate."', '".$sex."', '".$color."') ;";
	mysqli_query($conn, $sql); 

	header("Location:../pages/adminMainPage.php");
?>
