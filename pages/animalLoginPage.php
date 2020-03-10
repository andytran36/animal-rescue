<!DOCTYPE html>
<html>
<head>
		
	<title>ANIMAL LOGIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style type="text/css">
		#content{
			text-align: center;
			color: white;
			padding-top: 40%;
			padding-left: 30%;
			width: 500px;
		} 

		#content hr{
			color: grey;
		}

		body{
			background-image: url("../imgs/animalLoginPic.jpg");
			background-size: cover;
			font-family: Lato;
			font-weight: bold;
			text-shadow: 0px 4px 3px black,
						 0px 8px 13px grey,
						 0px 18px 23px white;
			
		}  

		h1{
			font-size: 5em;
			
		} 

		html{
			height: 100%;
		}	

		.spacer{
			height: 0em;
		}

		hr{
			width: 400px;
			border: 1px solid #f8f8f8;
		}
    </style>
	</style>
</head>
<body>

	<div class="row pageCustom">
			<div class="col-xs-12">
				<div id="content">
					<form action="../includes/validateAnimalLogin.php" method="POST">
				  		<div class="form-group">
				   			 <label>The Animal's unique ID: </label>
				    		<input type="text" name="animalID" class="form-control" placeholder="Enter Animal ID" required><br>
				  		</div>
				  		<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
					</form>
				</div>
			</div>
	</div>

	<!-- Put forms here on -->

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>