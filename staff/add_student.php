<?php 
	$get_class = file_get_contents('http://127.0.0.1:5000/get_class');
	$get_class = json_decode($get_class); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Add student-Staff
	</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

	<!-----------------------------------------------Navbar--------------------------------------------->
	<div class="bg"></div>
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
				<li class="nav-item">
					<a class="nav-link" href="staff_profile.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Profile</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="add_student.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Add student</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="query.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Ask Query</a>
				</li>

			</ul>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
			</div>

		</div>
	</nav>
	<!-----------------------------------------------Navbar end--------------------------------------------->

		<div class="container d-flex text-light justify-content-center">

		<form class="text-center border border-light mt-5 p-5" style="background-color: rgba(0, 32, 128,0.2);" action="javascript:add_student()">

		    <p class="h4 mb-4">Add Student</p>

		    <input type="text" id="register_no" class="form-control mb-4" autocomplete="off" required="" placeholder="Register Number">

		    <input type="text" id="student_name" class="form-control mb-4" autocomplete="off" required="" placeholder="Student Name">

		    <p class="h5 mb-4 text-left">Class</p>
		    <div class="radio">
		    	<div class="switch-field justify-content-center">
		    		<?php foreach ($get_class as $key => $value) { ?>
		    			
		    			
		    			<input type="radio" value="<?php echo $value->class_name; ?>" id='<?php echo $value->class_name; ?>' name="cls" required>
		    			<label for="<?php echo $value->class_name; ?>"><?php echo strtoupper($value->class_name); ?></label>
		    			
		    		<?php } ?>
		    	</div>
		    </div>

		    <button class="btn btn-primary btn-block my-4" type="submit">Add</button>

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