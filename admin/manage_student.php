<?php 
$get_class = file_get_contents('http://127.0.0.1:5000/get_class');
$get_class = json_decode($get_class); 

$query_count = file_get_contents('http://127.0.0.1:5000/pending_query_count');
$query_count = json_decode($query_count);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		View Student-Admin
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
					<a class="nav-link" href="manage_class.php">Manage Class</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="manage_staff.php">Manage Staff</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="manage_student.php">Manage Student</a>
				</li>
			</ul>
			<a href="query.php" class="notification">
				<span>Inbox</span>
				<span class="badge"><?php echo $query_count[0]->count; ?></span>
			</a>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
			</div>
		</div>
	</nav>
	<!-----------------------------------------------Navbar end--------------------------------------------->
	<p class="text-light ml-4">View Class Students:</p>
	<div class="row m-3">
		
		<div class="btn-group-toggle">
			<?php foreach ($get_class as $key => $value) { ?>
                 <label class="btn btn-primary ml-1" >
                  <input type="radio" value="<?php echo $value->class_name;?>" onclick='class_select_fn()' name='class_select'> <?php echo strtoupper($value->class_name); ?></input>
                </label> 
            <?php } ?>
        </div>
	</div>
	<div class="container d-flex justify-content-center mt-5">
		<div class="row text-light">
			<div class="col">
				<form class="text-center border border-light p-5" style="background-color: rgba(0, 32, 128,0.2);" action="javascript:add_student()">

					<p class="h4 mb-4">Add Student</p>

					<input type="text" id="register_no" class="form-control mb-4" autocomplete="off" required="" placeholder="Register Number">

					<input type="text" id="student_name" class="form-control mb-4" autocomplete="off" required="" placeholder="Student Name">

					<p class="h5 mb-4 text-left">Class :</p>
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
			<div class="col">
				<form class="text-center border border-light p-5" style="background-color: rgba(0, 32, 128,0.2);" action="javascript:delete_student()">
					<p class="h4 mb-4">Delete Student</p>
					<input type="text" id="rollno" class="form-control mb-4" autocomplete="off" required="" placeholder="Register Number">

					<button class="btn btn-primary btn-block my-4" type="submit">Delete</button>

				</form>
			</div>
		</div>
		

	</div>
</body>

<script src="./assets/js/script.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>