<?php
session_start();
include_once '../includes/connectToDB.php';


	$event_id = $_SESSION['eventID'];

	$sql = "SELECT * 
			FROM rescue.event as e
			WHERE e.event_id='".$event_id."';";

	$sql1 = "SELECT *
			 FROM rescue.event as e, rescue.animal as a, rescue.attends as at 
			 WHERE e.event_id='".$event_id."' AND e.event_id = at.event_id AND at.animal_id = a.animal_id;";

	$sql2 = "SELECT *
			 FROM rescue.event as e, rescue.works as w, rescue.member as m 
			 WHERE e.event_id='".$event_id."' AND e.event_id = w.event_id AND w.member_id = m.member_id;";

	$sql3 = "SELECT *
			 FROM rescue.event as e, rescue.volunteers_at as va, rescue.volunteer as v, rescue.member as m
			 WHERE e.event_id='".$event_id."' AND e.event_id = va.event_id AND va.member_id = v.member_id AND v.member_id = m.member_id;";


	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	$result2 = mysqli_query($conn, $sql2);
	$result3 = mysqli_query($conn, $sql3);



	while($row = mysqli_fetch_assoc($result)){

				$event_location = $row['event_location'];
				$event_type = $row['event_type'];
				$event_date = $row['event_date'];
				$sponsors = $row['sponsors'];

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>EVENT</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">EVENT</a>
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

	<div class="welcome"><h1 class="welcomeTxt uppercase">EVENT NUMBER <?php echo $event_id; ?> </h1> </div>

	<div class="animalInfo jumbotron">
		<div class="row">
			<div class="col card">
				<h5>Event Location: <?php echo $event_location; ?></h5>
				<h5>Event Type: <?php echo $event_type; ?></h5>
			</div>
			<div class="col card">
				<h5>Event Date: <?php echo $event_date; ?></h5>
				<h5>Sponsors: <?php echo $sponsors; ?></h5>
			</div>
		</div>
	</div>

	<div class="jumbotron">
		<h3><?php echo $event_id; ?>'s Animal Attendees: </h3>
		<table>
			<tr>
				<th>Animal ID</th>
				<th>Animal Name</th>
				<th>Animal Type</th>
				<th>Animal Health Status</th>
				<th>Animal Description</th>

			</tr>

		<?php

			if(mysqli_num_rows($result1) > 0){
				while($row1 = mysqli_fetch_assoc($result1)){
					echo "<tr><td>". $row1["animal_id"] ."</td><td>". $row1["name"] ."</td><td>". $row1["animal_type"] ."</td><td>". $row1["health_status"] ."</td><td>". $row1["description"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS EVENT DID NOT HAVE ANIMAL ATTENDEES!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $event_id; ?>'s Workers: </h3>

		<?php

			if(mysqli_num_rows($result2) > 0){
				echo "
				<table>
					<tr>
						<th>Worker ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Title</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Hours</th>
					</tr>";
				while($row2 = mysqli_fetch_assoc($result2)){
					echo "<tr><td>". $row2["member_id"] ."</td><td>". $row2["fname"] ."</td><td>". $row2["lname"] ."</td><td>". $row2["title"] ."</td><td>". $row2["phone"] ."</td><td>". $row2["role"] ."</td><td>". $row2["hours"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS EVENT DID NOT HAVE WORKER ATTENDEES!";
			}
		
		?>
	</div>

	<div class="jumbotron">
		<h3><?php echo $event_id; ?>'s Volunteers: </h3>

		<?php

			if(mysqli_num_rows($result3) > 0){
				echo "		
				<table>
					<tr>
						<th>Volunteer ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Volunteer Training Status</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Hours</th>
					</tr>";
				while($row3 = mysqli_fetch_assoc($result3)){
					if ($row3["training_status"] === "0")
						$training = "false";
					else $training = "true";

					echo "<tr><td>". $row3["member_id"] ."</td><td>". $row3["fname"] ."</td><td>". $row3["lname"] ."</td><td>". $training ."</td><td>". $row3["phone"] ."</td><td>". $row3["role"] ."</td><td>". $row3["hours"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS EVENT DID NOT HAVE VOLUNTEER ATTENDEES!";
			}
		
		?>
	</div>
</body>
</html>