<?php
session_start();
include_once '../includes/connectToDB.php';


	$member_id = $_SESSION['memberID'];
	$pass = $_SESSION['passID'];

	$sql = "SELECT * 
			FROM rescue.member as m, rescue.veterinarian as v
			WHERE m.member_id='".$member_id."'AND m.password='".$pass."' AND v.member_id=m.member_id;";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){

				$title = $row['title'];
				$phone = $row['phone'];
				$fname = $row['fname'];
				$minit = $row['minit'];
				$lname = $row['lname'];
				$address = $row['address'];
				$start_date = $row['start_date'];
				$specialization = $row['specialization'];
				$years_experience = $row['years_experience'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>VETERINARIAN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">VETERINARIAN</a>
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

	<div class="welcome"><h1 class="welcomeTxt">WELCOME VETERINARIAN</h1></div>

	<div class="veterinarianInfo jumbotron">
		<h4 class="textCenter">PERSONAL INFORMATION:</h4>
		<div class="row">
			<div class="col card">
				<h5>First Name: <?php echo $fname; ?></h5>
				<h5>Middle Initial: <?php echo $minit; ?></h5>
				<h5>Last Name: <?php echo $lname; ?></h5>
			</div>
			<div class="col-5 card">
				<h5>Start Date: <?php echo $start_date; ?></h5>
				<h5>Address: <?php echo $address; ?></h5>
				<h5>Phone: <?php echo $phone; ?></h5>
			</div>
			<div class="col card">
				<h5>Specialization: <?php echo $specialization; ?></h5>
				<h5>Years of Experience: <?php echo $years_experience; ?></h5>
			</div>
		</div>
	</div>
	
	<div class="jumbotron container">
		<h4 class="textCenter">ADD NEW TREATMENT ENTRY:</h4>
		<form method="POST" action="../includes/newTreats.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Animal ID: </label>
					<input type="text" name="animal_id" class="form-control" placeholder="Animal ID" required><br>
				</div>
				<div class="col-5">
					<label>Treatement: </label>
					<input type="text" name="type" class="form-control" placeholder="Vaccination, surgery, etc.." required><br>
				</div>
				<div class="col">
					<label>Duration: </label>
					<input type="text" name="duration" class="form-control" placeholder="Duration of care in hours"><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>

		<p></p>
		<h4 class="textCenter">REMOVE A TREATMENT ENTRY:</h4>
		<form method="POST" action="../includes/removeTreats.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Animal ID: </label>
					<input type="text" name="animal_id" class="form-control" placeholder="Animal ID" required><br>
				</div>
				<div class="col">
					<label>Date: </label>
					<input type="date" name="date" class="form-control"><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron container">
		<h3>Past Treatments: </h3>
		<?php
			
			$sql = "SELECT * FROM TREATS WHERE member_id = '".$member_id."'; ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				echo "
				<table>
					<tr>
						<th style='width:150px'>ANIMAL ID         </th>
						<th style='width:200px'>TREATMENT DATE         </th>
						<th>TREATMENT DURATION     </th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>". $row["animal_id"] ."</td><td>". $row["treat_date"] ."</td><td>". $row["treat_duration"] . " hour(s)" ."</td><td>";
				}
				echo "</table>";
			}
			else{
				echo "NO CARES FOR ENTRIES YET!";
			}
		?>
	</div>

	<div class="jumbotron container">
		<h4 class="textCenter">ADD NEW EVENT WORKED AT:</h4>
		<form method="POST" action="../includes/newWorks.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Event ID: </label>
					<input type="text" name="event_id" class="form-control" placeholder="Event ID" required><br>
				</div>
				<div class="col-5">
					<label>Role at Event: </label>
					<input type="text" name="role" class="form-control" placeholder="On-site vet, speaker, etc.." required><br>
				</div>
				<div class="col">
					<label>Hours Worked: </label>
					<input type="text" name="hours" class="form-control" placeholder="Hours worked at event"><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
		
		<p></p>
		<h4 class="textCenter">REMOVE AN EVENT WORKED AT:</h4>
		<form method="POST" action="../includes/removeWorks.php">
			<input type="hidden" name="member_id" value=<?php echo "'" + $member_id + "'"?>>
			<div class="row">
				<div class="col">
					<label>Event ID: </label>
					<input type="text" name="event_id" class="form-control" placeholder="Event ID" required><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron">
		<h3>Past Events Worked: </h3>
		<?php
			
			$sql = "SELECT * 
					FROM EVENT AS E JOIN WORKS AS W
					ON E.event_id = W.event_id AND W.member_id = '".$member_id."'; ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				echo "
				<table>
					<tr>
						<th style='width:150px'>EVENT ID         </th>
						<th style='width:200px'>EVENT TYPE       </th>
						<th style='width:600px'>LOCATION 		 </th>
						<th style='width:200px'>ROLE 			 </th>
						<th style='width:200px'>HOURS 			 </th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>". $row["event_id"] ."</td><td>". $row["event_type"] ."</td><td>". $row["event_location"]."</td><td>". $row["role"]."</td><td>". $row["hours"]."</td><td>";
				}
				echo "</table>";
			}
			else{
				echo "NO EVENTS WORKED YET!";
			}
		?>
	</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>