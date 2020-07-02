<?php 
	session_start();
	$get_student = file_get_contents('https://attendance-flask-app.herokuapp.com/get_student_details/'.$_SESSION['regno']);
	$get_student = json_decode($get_student);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Student Profile
	</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

	<!-----------------------------------------------Navbar--------------------------------------------->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="dashboard.php?regno=<?php echo $_SESSION['regno']; ?>">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="staff_profile.php">Profile</a>
				</li>

			</ul>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='dashboard.php?hello=true&regno=<?php echo $_SESSION["regno"]; ?>' style="text-decoration: none;">Logout</a>
			</div>

		</div>
	</nav>
	<!-----------------------------------------------Navbar end--------------------------------------------->


	<div class="container mt-5 p-5  d-flex justify-content-center">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="https://cdn.dribbble.com/users/1503691/screenshots/3440667/paddl-dribbble-studentavatars-v3.gif" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Name: <?php echo $get_student[0]->student_name; ?></h5>
				
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item font-weight-bold">Register Number: <?php echo $_SESSION['regno']; ?></li>
				<li class="list-group-item font-weight-bold">Class: <?php echo strtoupper($get_student[0]->class); ?></li>
				
			</ul>

		</div>
	</div>
	
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>