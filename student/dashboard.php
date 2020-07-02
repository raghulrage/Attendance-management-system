<?php 
session_start();
$regno = $_GET['regno'];
$_SESSION['regno'] = $regno;
$get_attendance = file_get_contents('https://attendance-flask-app.herokuapp.com/get_student_attendance/'.$regno);
$get_attendance = json_decode($get_attendance); 
function destroy(){
	session_unset();
	session_destroy();
	header("Location: login.php");
}
if (isset($_GET['hello'])) {
	destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Student Dashboard
	</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link " href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="profile.php">Profile</a>
				</li>

			</ul>
			<div class="navbar">
				<i class="fa fa-sign-out" style="color:white"></i>
				<a href='dashboard.php?hello=true' style="text-decoration: none;">Logout</a>
			</div>
		</div>
	</nav>

	<!-- ---------------------------------------------------------------------------------- -->
	<div class="row m-5 "> 
		<input class="form-control mb-3" id="myInput" type="text" placeholder="Search..">
		<table class="table table-bordered mb-0 table-hover table-light table-striped">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Date</th>
					<th scope="col">Attendance</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $i=1; ?>
				<?php if ($get_attendance != '0') { ?>
					<?php foreach ($get_attendance as $key => $value) { ?>
						<tr>
							<th scope="row"><?php echo $i; ?></th>
							<td><?php echo $value->date; ?></td>
							<td><?php if ($value->attendance == 'Present') { ?>
              <p class="text-success font-weight-bold mb-0">Present</p> <?php } else { ?>
              <p class="text-danger font-weight-bold mb-0">Absent</p> <?php } ?></td>

						</tr>
						<?php $i++; ?>
					<?php } ?>
				<?php } ?>
			</tbody>	
		</table>
		<?php if ($get_attendance == '0') { ?>
		<p class="p-2 w-100 mb-2 bg-light text-dark d-flex justify-content-center">No Records Found</p>	
		<?php } ?>
	</div>


</body>

<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>

<script src="./assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>