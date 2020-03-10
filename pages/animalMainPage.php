<?php
session_start();
include_once '../includes/connectToDB.php';


	$animal_id = $_SESSION['animalID'];

	$sql = "SELECT * 
			FROM rescue.animal as a
			WHERE a.animal_id='".$animal_id."';";

	$sql1 = "SELECT *
			 FROM rescue.attends as at, rescue.event as e, rescue.animal as a
			 WHERE a.animal_id = '".$animal_id."' AND a.animal_id = at.animal_id AND at.event_id = e.event_id;";

	$sql2 = "SELECT *
			 FROM rescue.animal as a, rescue.shelter as s
			 WHERE a.animal_id = '".$animal_id."' AND s.shelter_no = a.shelter_no;";

	$sql3 = "SELECT *
			 FROM rescue.plays_with as p, rescue.volunteer as v, rescue.animal as a, rescue.member as m
			 WHERE a.animal_id = '".$animal_id."' AND p.animal_id = a.animal_id AND p.member_id = v.member_id AND v.member_id = m.member_id;";

	$sql4 = "SELECT *
			 FROM rescue.animal as a, rescue.treats as t, rescue.veterinarian as v, rescue.member as m
			 WHERE a.animal_id = '".$animal_id."' AND a.animal_id = t.animal_id AND t.member_id = v.member_id AND v.member_id = m.member_id;";

	$sql5 = "SELECT *
			 FROM rescue.animal as a, rescue.cares_for as ca, rescue.caretaker as c, rescue.member as m
			 WHERE a.animal_id = '".$animal_id."' AND a.animal_id = ca.animal_id AND ca.member_id = c.member_id AND c.member_id = m.member_id;";

	$sql6 = "SELECT *
			 FROM rescue.animal as a, rescue.fosters as fo, rescue.foster as f, rescue.member as m
			 WHERE a.animal_id = '".$animal_id."' AND a.animal_id = fo.animal_id AND fo.member_id = f.member_id AND f.member_id = m.member_id;";

	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	$result2 = mysqli_query($conn, $sql2);
	$result3 = mysqli_query($conn, $sql3);
	$result4 = mysqli_query($conn, $sql4);
	$result5 = mysqli_query($conn, $sql5);
	$result6 = mysqli_query($conn, $sql6);


	while($row = mysqli_fetch_assoc($result)){

				$shelter_no = $row['shelter_no'];
				$name = $row['name'];
				$age = $row['age'];
				$size = $row['size'];
				$color = $row['color'];
				$weight = $row['weight'];
				$animal_type = $row['animal_type'];
				$health_status = $row['health_status'];
				$description = $row['description'];
				$admission_date = $row['admission_date'];
				$shelter_admit_date = $row['shelter_admit_date'];
				$gender = $row['gender'];
	}

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
	  <a class="navbar-brand" href="#">ANIMAL</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="loginPage.php">LOGOUT</a>
	      </li>
	    </ul>s
	  </div>
	</nav>

	<div class="welcome"><h1 class="welcomeTxt uppercase">WELCOME <?php echo $name; ?> </h1> </div>

	<div class="animalInfo jumbotron">
		<div class="row">
			<div class="col card">
				<h5>Unique Animal ID: <?php echo $animal_id; ?></h5>
				<h5>Unique Shelter ID: <?php echo $shelter_no; ?></h5>
			</div>
			<div class="col card">
				<h5>Age: <?php echo $age; ?></h5>
				<h5>Size: <?php echo $size; ?></h5>
				<h5>Weight: <?php echo $weight; ?></h5>
				<h5>Gender: <?php echo $gender; ?></h5>
				<h5>Color: <?php echo $color; ?></h5>
			</div>
			<div class="col-4 card">
				
				<h5>Animal Type: <?php echo $animal_type; ?></h5>
				<h5>Health Status: <?php echo $health_status; ?></h5>
				<h5>Description: <?php echo $description; ?></h5>
			</div>
			<div class="col card">
				<h5>Admission Date: <?php echo $admission_date; ?></h5>
				<h5>Shelter Admit Date: <?php echo $shelter_admit_date; ?></h5>	
			</div>
		</div>
	</div>

	<div class="jumbotron">
		<h3><?php echo $name; ?>'s attended events: </h3>
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
				echo "THIS ANIMAL HAS NOT ATTENDED ANY EVENTS YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $name; ?>'s current shelter: </h3>
		<table>
			<tr>
				<th>Shelter Number</th>
				<th>Shelter Type</th>
				<th>Last Cleaned</th>
				<th>Width</th>
				<th>Height</th>
				<th>Length</th>


			</tr>

		<?php

			if(mysqli_num_rows($result2) > 0){
				while($row2 = mysqli_fetch_assoc($result2)){
					echo "<tr><td>". $row2["shelter_no"] ."</td><td>". $row2["shelter_type"] ."</td><td>". $row2["last_cleaned"] ."</td><td>". $row2["width"] ."</td><td>". $row2["height"] ."</td><td>". $row2["length"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS ANIMAL IS NOT IN ASSIGNED A SHELTER RIGHT NOW!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3>Volunteers who have played with <?php echo $name; ?>: </h3>
		<table>
			<tr>
				<th>Volunteer ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Play Date</th>
				<th>Volunteer Training Status</th>

			</tr>

		<?php

			if(mysqli_num_rows($result3) > 0){
				while($row3 = mysqli_fetch_assoc($result3)){
					echo "<tr><td>". $row3["member_id"] ."</td><td>". $row3["fname"] ."</td><td>". $row3["lname"] ."</td><td>". $row3["phone"] ."</td><td>". $row3["play_date"] ."</td><td>". $row3["training_status"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS ANIMAL HAS NOT PLAYED WITH A VOLUNTEER YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $name; ?>'s Veterinarians: </h3>
		<table>
			<tr>
				<th>Veterinarian ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Treatment Type</th>
				<th>Treatment Date</th>
				<th>Treatment Duration</th>
				<th>Specialization</th>
				<th>Years of Experience</th>

			</tr>

		<?php

			if(mysqli_num_rows($result4) > 0){
				while($row4 = mysqli_fetch_assoc($result4)){
					echo "<tr><td>". $row4["member_id"] ."</td><td>". $row4["fname"] ."</td><td>". $row4["lname"] ."</td><td>". $row4["phone"] ."</td><td>". $row4["treat_type"] ."</td><td>". $row4["treat_date"] ."</td><td>". $row4["treat_duration"] ."</td><td>". $row4["specialization"] ."</td><td>". $row4["years_experience"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS ANIMAL HAS NOT BEEN TREATED BY A VETERINARIAN YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $name; ?>'s Caretakers: </h3>

		<?php
			if(mysqli_num_rows($result5) > 0){

				echo "		
				<table>
					<tr>
						<th>Caretaker ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone</th>
						<th>Care Date</th>
						<th>Care Duration</th>
						<th>Caretaker Trained Species</th>
					</tr>";

				while($row5 = mysqli_fetch_assoc($result5)){
					echo "<tr><td>". $row5["member_id"] ."</td><td>". $row5["fname"] ."</td><td>". $row5["lname"] ."</td><td>". $row5["phone"] ."</td><td>". $row5["care_date"] ."</td><td>". $row5["care_duration"] ."</td><td>". $row5["trained_species"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS ANIMAL HAS NOT BEEN CARED FOR BY A CARETAKER YET!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $name; ?>'s Fosters: </h3>

		<?php

			if(mysqli_num_rows($result6) > 0){
				echo 
				"<table>
					<tr>
						<th>Foster ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone</th>
						<th>Foster Status</th>
						<th>Foster Duration</th>
						<th>Foster's Comments</th>
					</tr>";
				while($row6 = mysqli_fetch_assoc($result6)){
					echo "<tr><td>". $row6["member_id"] ."</td><td>". $row6["fname"] ."</td><td>". $row6["lname"] ."</td><td>". $row6["phone"] ."</td><td>". $row6["foster_status"] ."</td><td>". $row6["duration"] ."</td><td>". $row6["comment"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS ANIMAL HAS NOT BEEN FOSTERED BY A FOSTER YET!";
			}
		?>
	</div>

</body>
</html>