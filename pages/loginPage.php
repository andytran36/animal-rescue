<!DOCTYPE html>
<html>
<head>
	
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style type="text/css">
    	.pageCustom{
    		
    	}

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
			background-image: url("../imgs/xmasLoginPic.jpg");
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
</head>
<body>
	<div class="row pageCustom">
			<div class="col-xs-12">
				<div id="content">
					<form action="../includes/validateLogin.php" method="POST">
				  		<div class="form-group">
				   			 <label>Your Personal ID: </label>
				    		<input type="text" name="memberID" class="form-control" placeholder="Enter Personal ID" required><br>
				  		</div>
				  		<div class="form-group">
				   			<label>Your Password: </label>
				    		<input type="password" name="passID" class="form-control"placeholder="Your Password" required=""><br>
				  		</div>
				  		<button type="submit" name="submit" class="btn btn-primary" required>Submit</button>
					</form>
					<button type="button" name="guest" class="btn btn-success" style="margin-top:25px;" onclick="location.href = 'guestPage.php'">Proceed as Guest</button>
				</div>
			</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>
</html>