<?php
session_start();
include_once '../includes/connectToDB.php';


	$animal_id = $_SESSION['animalID'];

	$sql = "SELECT * 
			FROM rescue.animal;";

	$sql1 = "SELECT *
			 FROM rescue.event;";

	$sql2 = "SELECT *
			 FROM rescue.member as m
			 WHERE m.title <> 'Potential Adopter' AND m.title <> 'Admin';";


	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	$result2 = mysqli_query($conn, $sql2);


?>

<!DOCTYPE html>
<html>
<head>
	<title>ANIMAL</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">GUEST</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="loginPage.php">LOGIN</a>
	      </li>
	    </ul>s
	  </div>
	</nav>

	<div class="welcome"><h1 class="welcomeTxt uppercase">WELCOME TO ANIMAL RESCUE</h1> </div>

	<div class="jumbotron">
		<h3>Our Animals: </h3>
		<table>
			<tr>
				<th>ANIMAL ID</th>
				<th>ANIMAL NAME</th>
				<th>ANIMAL TYPE</th>
				<th>AGE</th>
				<th>COLOR</th>
				<th>GENDER</th>
				<th>SIZE</th>
				<th>WEIGHT</th>
				<th>HEALTH STATUS</th>
				<th>ADMISSION DATE</th>
				<th>SHELTER ADMIT DATE</th>
				<th>DESCRIPTION</th>
			</tr>

		<?php

			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>". $row["animal_id"] ."</td><td>". $row["name"] ."</td><td>". $row["animal_type"] ."</td><td>". $row["age"] ."</td><td>". $row["color"] ."</td><td>". $row["gender"] ."</td><td>". $row["size"] ."</td><td>". $row["weight"] ."</td><td>". $row["health_status"] ."</td><td>". $row["admission_date"] ."</td><td>". $row["shelter_admit_date"] ."</td><td>". $row["description"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THERE ARE NO ANIMALS IN THE SHELTER YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3>Our Events: </h3>
		<table>
			<tr>
				<th>Event ID</th>
				<th>Event Location</th>
				<th>Event Type</th>
				<th>Event Date</th>
				<th>Sponsors</th>

			</tr>

		<?php

			if(mysqli_num_rows($result1) > 0){
				while($row1 = mysqli_fetch_assoc($result1)){
					echo "<tr><td>". $row1["event_id"] ."</td><td>". $row1["event_location"] ."</td><td>". $row1["event_type"] ."</td><td>". $row1["event_date"] ."</td><td>". $row1["sponsors"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THERE ARE NOT ANY EVENTS YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3>Our Staff: </h3>
		<table>
			<tr>
				<th>FIRST NAME</th>
				<th>MIDDLE INITIAL</th>
				<th>LAST NAME</th>
				<th>START DATE</th>
				<th>TITLE</th>
			</tr>

		<?php

			if(mysqli_num_rows($result2) > 0){
				while($row2 = mysqli_fetch_assoc($result2)){
					echo "<tr><td>". $row2["fname"] ."</td><td>". $row2["minit"] ."</td><td>". $row2["lname"] ."</td><td>". $row2["start_date"] ."</td><td>". $row2["title"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THERE ARE NO STAFF MEMBERS YET!";
			}
		
		?>
	</div>

</body>
</html>