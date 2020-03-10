<?php
session_start();
include_once '../includes/connectToDB.php';


	$member_id = $_SESSION['memberID'];
	$pass = $_SESSION['passID'];

	$sql = "SELECT * 
			FROM rescue.member as m, rescue.potential_adopter as p
			WHERE m.member_id='".$member_id."'AND m.password='".$pass."';";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){

				$title = $row['title'];
				$phone = $row['phone'];
				$fname = $row['fname'];
				$minit = $row['minit'];
				$lname = $row['lname'];
				$start_date = $row['start_date'];
				$address = $row['address'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADOPTER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">ADOPTER</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="animalLoginPage.php">ANIMAL</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="eventLoginPage.php">EVENT</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="shelterLoginPage.php">SHELTER</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../index.php">LOGOUT</a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div class="welcome"><h1 class="welcomeTxt">WELCOME ADOPTER</h1></div>

	<div class="potential_adopterInfo jumbotron">
		<div class="row">
			<div class="col card">
				<h5>First Name: <?php echo $fname; ?></h5>
				<h5>Middle Initial: <?php echo $minit; ?></h5>
				<h5>Last Name: <?php echo $lname; ?></h5>
			</div>
			<div class="col-7 card">
				<h5>Address: <?php echo $address; ?></h5>
				<h5>Phone: <?php echo $phone; ?></h5>
			</div>
		</div>
	</div>
	
	<div class="jumbotron container">
		<h3>Your List of Animals: </h3>
		<?php
			$sql = "SELECT * 
					FROM ANIMAL AS A, POTENTIAL_ADOPTER AS P
					WHERE A.animal_id = P.animal_id AND P.member_id = '".$member_id."';";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				echo "
				<table>
					<tr>
						<th style='width:100px'>ANIMAL ID         </th>
						<th style='width:150px'>NAME  		      </th>
						<th>DESCRIPTION       </th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>". $row["animal_id"] ."</td><td>". $row["name"] ."</td><td>". $row["description"] ."</td><td>";
				}
				echo "</table>";
			}
			else{
				echo "NO ANIMALS IN YOUR LIST YET!";
			}
		
		?>
	</div>

	<div class="jumbotron container">
		<h4 class="textCenter">ADD NEW ANIMAL TO YOUR LIST:</h4>
		<form method="POST" action="../includes/newPotentialAdopt.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Animal ID: </label>
					<input type="text" name="animal_id" class="form-control" placeholder="Animal ID" required><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
		<p></p>
		
		<h4 class="textCenter">REMOVE AN ANIMAL FROM YOUR LIST:</h4>
		<form method="POST" action="../includes/removePotentialAdopt.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Animal ID: </label>
					<input type="text" name="animal_id" class="form-control" placeholder="Animal ID" required><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron">
		<h3>Our Animals: </h3>
		<?php
			$sql = "SELECT * FROM ANIMAL;";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){

				echo "
				<table>
					<tr>
						<th style='width:100px'>ANIMAL ID</th>
						<th style='width:100px'>NAME</th>
						<th style='width:100px'>TYPE</th>
						<th style='width:50px'>AGE</th>
						<th style='width:100px'>COLOR</th>
						<th style='width:80px'>GENDER</th>
						<th style='width:80px'>SIZE</th>
						<th style='width:70px'>WEIGHT</th>
						<th style='width:150px'>HEALTH STATUS</th>
						<th style='width:150px'>ADMISSION DATE</th>
						<th>DESCRIPTION</th>
					</tr>";

				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>". $row["animal_id"] ."</td><td>". $row["name"] ."</td><td>". $row["animal_type"] ."</td><td>". $row["age"] ."</td><td>". $row["color"] ."</td><td>". $row["gender"] ."</td><td>". $row["size"] ."</td><td>". $row["weight"] ."lbs"."</td><td>". $row["health_status"] ."</td><td>". $row["admission_date"] ."</td><td>". $row["description"] ."</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "THERE ARE NO ANIMALS IN THE SHELTER YET!";
			}
		
		?>


	<!-- Put forms here on -->

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>