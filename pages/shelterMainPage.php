<?php
session_start();
include_once '../includes/connectToDB.php';


	$shelter_no = $_SESSION['shelterID'];

	$sql = "SELECT * 
			FROM rescue.shelter as s
			WHERE s.shelter_no='".$shelter_no."';";

	$sql1 = "SELECT *
			 FROM rescue.shelter as s, rescue.cleans as c, rescue.volunteer as v, rescue.member as m 
			 WHERE s.shelter_no='".$shelter_no."' AND s.shelter_no = c.shelter_no AND c.member_id = v.member_id AND v.member_id = m.member_id;";

	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);

	while($row = mysqli_fetch_assoc($result)){

				$shelter_type = $row['shelter_type'];
				$last_cleaned = $row['last_cleaned'];
				$width = $row['width'];
				$height = $row['height'];
				$length = $row['length'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SHELTER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">SHELTER</a>
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

	<div class="welcome"><h1 class="welcomeTxt uppercase">SHELTER NUMBER <?php echo $shelter_no; ?> </h1> </div>

	<div class="animalInfo jumbotron">
		<div class="row">
			<div class="col card">
				<h5>Shelter Type: <?php echo $shelter_type; ?></h5>
				<h5>Last Cleaned: <?php echo $last_cleaned; ?></h5>
			</div>
			<div class="col card">
				<h5>Width: <?php echo $width; ?></h5>
				<h5>Height: <?php echo $height; ?></h5>
				<h5>Length: <?php echo $length; ?></h5>
			</div>
		</div>
	</div>

	<div class="jumbotron">
		<h3>Shelter #<?php echo $shelter_no; ?>'s cleaning history: </h3>
		<table>
			<tr>
				<th>Volunteer ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Volunteer Training Status</th>
				<th>Phone</th>
				<th>Cleaning Date</th>


			</tr>

		<?php

			if(mysqli_num_rows($result1) > 0){
				while($row1 = mysqli_fetch_assoc($result1)){
					echo "<tr><td>". $row1["member_id"] ."</td><td>". $row1["fname"] ."</td><td>". $row1["lname"] ."</td><td>". $row1["training_status"] ."</td><td>". $row1["phone"] ."</td><td>". $row1["cleaning_date"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THIS SHELTER HASN'T BEEN CLEANED BY A VOLUNTEER YET!";
			}
		
		?>
	</div>

</body>
</html>