
<!DOCTYPE html>
<html>
<head>
	<title>
		Delete Student-Admin
	</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_class.php">Add Class</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="delete_class.php">Delete Class</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="add_student.php">Add student</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="delete_student.php">Delete student</a>
				</li>
			</ul>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
			</div>
		</div>
	</nav>
	<!-----------------------------------------------Navbar end--------------------------------------------->

		<div class="container d-flex justify-content-center mt-5">

		<form class="text-center border border-light p-5" style="background-color: rgba(0, 32, 128,0.2);" action="javascript:delete_student()">
			<p class="h4 mb-4">Delete Student</p>
			<input type="text" id="register_no" class="form-control mb-4" autocomplete="off" required="" placeholder="Register Number">

		    <button class="btn btn-primary btn-block my-4" type="submit">Delete</button>

		</form>

	</div>
</body>

<script src="./assets/js/script.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>