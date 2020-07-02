<?php 
	$staff_info = file_get_contents('https://attendance-flask-app.herokuapp.com/get_staff_info/'.$_GET['staff_id']);
	$staff_info = json_decode($staff_info);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Staff Profile
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
					<a class="nav-link" href="index.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="staff_profile.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_student.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Add student</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="query.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Ask Query</a>
				</li>

			</ul>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='index.php?hello=true&cls=<?php echo $_GET["cls"];?>&<?php echo $_GET["staff_id"];?>' style="text-decoration: none;">Logout</a>
			</div>

		</div>
	</nav>
	<!-----------------------------------------------Navbar end--------------------------------------------->


	<div class="container mt-5 p-5  d-flex justify-content-center">
		<div class="card " style="width: 18rem;">
			<img class="card-img-top" src="https://cdn.dribbble.com/users/1000681/screenshots/3487082/teach2.gif" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php echo 'Staff Id : '.$_GET['staff_id'];?></h5>
				
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Name : <b><?php echo $staff_info[0]->staff_name; ?></b></li>
			</ul>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Attending Class : <b> <?php echo strtoupper($_GET['cls']); ?></b> </li>
			</ul>

		</div>
	</div>
	
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>