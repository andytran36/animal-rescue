<?php
session_start();
include_once '../includes/connectToDB.php';


	$member_id = $_SESSION['memberID'];
	$pass = $_SESSION['passID'];

	$sql = "SELECT * 
			FROM rescue.member as m
			WHERE m.member_id='".$member_id."'AND m.password='".$pass."';";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
				$title = $row['title'];
				$phone = $row['phone'];
				$fname = $row['fname'];
				$minit = $row['minit'];
				$lname = $row['lname'];
				$start_date = $row['start_date'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">ADMIN</a>
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

	<div class="welcome"><h1 class="welcomeTxt">WELCOME ADMIN</h1></div>

	<!-- Inserts a new member and adds entry with member id into volunteer -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD VOLUNTEER:</h1>
		<form method="POST" action="../includes/insertVolunteer.php">
			<div class="row">
				<div class="col">
					<label>First Name: </label>
					<input type="text" name="fname" class="form-control" placeholder="First Name" required><br>
				</div>
				<div class="col">
					<label>Middle Initial(s): </label>
					<input type="text" name="minit" class="form-control"><br>
				</div>
				<div class="col">
					<label>Last Name: </label>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Unique Member ID: </label>
						<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Training Completed? </label>
						<input type="checkbox" name="training" class="form-control" value="1"><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Address: </label>
						<input type="text" name="address" class="form-control" placeholder="Address" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="text" name="phone" class="form-control" placeholder="1112223333" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Start Date: </label>
						<input type="date" name="start_date" class="form-control" placeholder="Start Date" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- Inserts a new member and adds entry with member id into caretaker & employee -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD CARETAKER:</h1>
		<form method="POST" action="../includes/insertCaretaker.php">
			<div class="row">
				<div class="col">
					<label>First Name: </label>
					<input type="text" name="fname" class="form-control" placeholder="First Name" required><br>
				</div>
				<div class="col">
					<label>Middle Initial(s): </label>
					<input type="text" name="minit" class="form-control"><br>
				</div>
				<div class="col">
					<label>Last Name: </label>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Species Trained For: </label>
						<input type="text" name="species" class="form-control" placeholder="Dogs, cats, etc.." required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Salary: </label>
						<input type="text" name="salary" class="form-control" placeholder="Salary" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Unique Member ID: </label>
						<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" required><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Address: </label>
						<input type="text" name="address" class="form-control" placeholder="Address" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="text" name="phone" class="form-control" placeholder="1112223333" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Start Date: </label>
						<input type="date" name="start_date" class="form-control" placeholder="Start Date" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- Inserts a new member and adds entry with member id into vet & employee-->
	<div class="jumbotron">
		<h4 class="textCenter">ADD VETERINARIAN:</h1>
		<form method="POST" action="../includes/insertVet.php">
			<div class="row">
				<div class="col">
					<label>First Name: </label>
					<input type="text" name="fname" class="form-control" placeholder="First Name" required><br>
				</div>
				<div class="col">
					<label>Middle Initial(s): </label>
					<input type="text" name="minit" class="form-control"><br>
				</div>
				<div class="col">
					<label>Last Name: </label>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Specialization: </label>
						<input type="text" name="spec" class="form-control" placeholder="Anesthesia, welfare, etc.." required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Salary: </label>
						<input type="text" name="salary" class="form-control" placeholder="Salary" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Unique Member ID: </label>
						<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" required><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Address: </label>
						<input type="text" name="address" class="form-control" placeholder="Address" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="text" name="phone" class="form-control" placeholder="1112223333" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Start Date: </label>
						<input type="date" name="start_date" class="form-control" placeholder="Start Date" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Years of Experience: </label>
						<input type="text" name="years" class="form-control" placeholder="0, 1, etc.." required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- foster -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD FOSTER:</h1>
		<form method="POST" action="../includes/insertFoster.php">
			<div class="row">
				<div class="col">
					<label>First Name: </label>
					<input type="text" name="fname" class="form-control" placeholder="First Name" required><br>
				</div>
				<div class="col">
					<label>Middle Initial(s): </label>
					<input type="text" name="minit" class="form-control"><br>
				</div>
				<div class="col">
					<label>Last Name: </label>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Fostering Status: </label>
						<input type="text" name="status" class="form-control" placeholder="Fostering, awaiting animal, etc.." required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Unique Member ID: </label>
						<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" required><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Address: </label>
						<input type="text" name="address" class="form-control" placeholder="Address" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="text" name="phone" class="form-control" placeholder="1112223333" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- Potential Adopter -->
<div class="jumbotron">
		<h4 class="textCenter">NEW POTENTIAL ADOPTER:</h1>
		<form method="POST" action="../includes/insertAdopter.php">
			<div class="row">
				<div class="col">
					<label>First Name: </label>
					<input type="text" name="fname" class="form-control" placeholder="First Name" required><br>
				</div>
				<div class="col">
					<label>Middle Initial(s): </label>
					<input type="text" name="minit" class="form-control"><br>
				</div>
				<div class="col">
					<label>Last Name: </label>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Unique Member ID: </label>
						<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" required><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Address: </label>
						<input type="text" name="address" class="form-control" placeholder="Address" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="text" name="phone" class="form-control" placeholder="1112223333" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- Remove member and cascades -->
	<div class="jumbotron">
		<h4 class="textCenter">REMOVE MEMBER:</h1>
		<form method="POST" action="../includes/removeMember.php">
			<div class="form-group">
				<label>Unique Member ID: </label>
				<input type="text" name="member_id" class="form-control" placeholder="Member ID" required><br>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!--event_id`, `event_location`, `event_type`, `event_date`, `sponsors` -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD EVENT:</h1>
		<form method="POST" action="../includes/addEvent.php">
			<div class="row">
				<div class="col">
					<label>Event ID: </label>
					<input type="text" name="eid" class="form-control" placeholder="Event ID" required><br>
				</div>
				<div class="col">
					<label>Event Date: </label>
					<input type="date" name="edate" class="form-control" required placeholder="YYYY-MM-DD"><br>
				</div>
				<div class="col">
					<label>Event Type: </label>
					<input type="text" name="etype" class="form-control" required placeholder="Charity, Gala, etc.."><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Event Location: </label>
						<input type="text" name="elocation" class="form-control" placeholder="Location" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Sponsors: </label>
						<input type="text" name="esponsors" class="form-control" placeholder="Sponsors" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron">
		<h4 class="textCenter">REMOVE EVENT:</h1>
		<form method="POST" action="../includes/removeEvent.php">
			<div class="form-group">
				<label>Event ID: </label>
				<input type="text" name="eid" class="form-control" placeholder="Event ID" required><br>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- `animal_id`, `shelter_no`, `age`, `size`, `weight`, `animal_type`, `health_status`, `description`, `admission_date`, `shelter_admit_date`, `gender` -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD ANIMAL:</h1>
		<form method="POST" action="../includes/addAnimal.php">
			<div class="row">
				<div class="col">
					<label>Animal Name: </label>
					<input type="text" name="name" class="form-control" placeholder="Name" required><br>
				</div>
				<div class="col">
					<label>Unique Animal ID: </label>
					<input type="text" name="aid" class="form-control" placeholder="Animal ID" required><br>
				</div>
				<div class="col">
					<label>Animal Type: </label>
					<input type="text" name="atype" class="form-control" required placeholder="Dog, Cat, etc.."><br>
				</div>
				<div class="col">
					<label>Admission Date: </label>
					<input type="date" name="admit_date" class="form-control" required placeholder="YYYY-MM-DD"><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Age (in years, put 0 if less than 1 year old): </label>
						<input type="text" name="age" class="form-control" placeholder="Age" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Size: </label>
						<input type="text" name="size" class="form-control" placeholder="Small, Medium, Big" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Weight: </label>
						<input type="text" name="weight" class="form-control" placeholder="Weight" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Color(s): </label>
						<input type="text" name="color" class="form-control" placeholder="Brown, Black, etc.." required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Health Status: </label>
						<input type="text" name="health" class="form-control" placeholder="Healthy, Sick, etc.." required><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Shelter Number: </label>
						<input type="text" name="shelter" class="form-control" placeholder="Shelter's ID Number" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Shelter Admit Date: </label>
						<input type="date" name="shelter_date" class="form-control" placeholder="YYYY-MM-DD" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Description: </label>
						<input type="text" name="desc" class="form-control" placeholder="Comments on behaviour, health, etc.." required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Sex: </label>
						<input type="text" name="sex" class="form-control" placeholder="Male, female, unknown.. " required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron">
		<h4 class="textCenter">REMOVE ANIMAL:</h1>
		<form method="POST" action="../includes/removeAnimal.php">
			<div class="form-group">
				<label>Animal ID: </label>
				<input type="text" name="aid" class="form-control" placeholder="Animal ID" required><br>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<!-- (`shelter_no`, `shelter_type`, `last_cleaned`, `width`, `height`, `length`) -->
	<div class="jumbotron">
		<h4 class="textCenter">ADD SHELTER:</h1>
		<form method="POST" action="../includes/addShelter.php">
			<div class="row">
				<div class="col">
					<label>Shelter Number: </label>
					<input type="text" name="sno" class="form-control" placeholder="Shelter Number" required><br>
				</div>
				<div class="col">
					<label>Shelter Type: </label>
					<input type="text" name="type" class="form-control" required placeholder="Dog, cat, etc.."><br>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Width: </label>
						<input type="text" name="width" class="form-control" placeholder="Width" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Height: </label>
						<input type="text" name="height" class="form-control" placeholder="Height" required><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Length: </label>
						<input type="text" name="length" class="form-control" placeholder="Length" required><br>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>

	<div class="jumbotron">
		<h4 class="textCenter">REMOVE SHELTER:</h1>
		<form method="POST" action="../includes/removeShelter.php">
			<div class="form-group">
				<label>Shelter Number: </label>
				<input type="text" name="sno" class="form-control" placeholder="Shelter Number" required><br>
			</div>
			<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
		</form>
	</div>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>