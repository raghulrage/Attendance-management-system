
<?php 
$get_students = file_get_contents('http://127.0.0.1:5000/get_students/'.$_GET['cls']);
$get_students = json_decode($get_students);

$get_date = file_get_contents('http://127.0.0.1:5000/get_date');
$get_date = json_decode($get_date);

$date = strval(intval(date('d'))).'-'.strval(intval(date('m'))).'-'.date('Y');

$check_attendance = 0;

foreach ($get_date as $key => $value) {
	if ($value->date == $date) {
		$get_attendance = file_get_contents('http://127.0.0.1:5000/get_attendance/'.$value->date);
		$get_attendance = json_decode($get_attendance); 

		foreach ($get_attendance as $key => $value) {
			if ($value->class == $_GET['cls']) {
				$check_attendance = 1;
				break;
			}
		}
		break;
	}
}
function destroy(){
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
		Staff Dashboard
	</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="staff_profile.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php  echo $_GET['cls'];?>">Profile</a>
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
				<a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
			</div>

		</div>
	</nav>
	<!-- --------------------------------------------------------------------------------------- -->
	<div class="bg"></div>
	<?php if ($check_attendance == 1) { ?>
		<div class="alert alert-warning alert-dismissible fade show m-0 p-2" role="alert">
			<strong>Attendance</strong> marked already!
			<button type="button" class="close p-2" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php } ?>
	<div class="row m-2 pl-5">
		<p class="h5">Date : &nbsp; </p>
		<p class="h5"> <?php echo date("d/m/Y"); ?></p>
	</div>
			<div class="container-fluid" style="opacity: 1;">
				
			<form class="p-5 ml-5 mr-5" action="javascript:attendance()">
				<div class="row w-100 d-flex justify-content-center" >
			<div class="row ml-5 font-weight-bold d-flex justify-content-center">
				<div class="col-3">
					<p>#</p>
				</div>
				<div class="col-3">
					<p >Name</p>
				</div>
				<div class="col-3">
					<p>Register number</p>
				</div>
				<div class="col-3">
					<p>Attendance</p>
				</div>
				<div class="row table-responsive" style="overflow-x: hidden; max-height: 400px;">
					<?php $i=1;?>
					<?php if($get_students==0){ ?>
						<p class="d-flex justify-content-center mt-5 text-light font-weight-bold">No Records Found</p>
					<?php } else{ ?>
						<?php foreach ($get_students as $key => $value) { ?>

							<div class="row mb-1">
								<div class="col-2 mr-5">
									<input type="text" class="form-control" name="id" value="<?= $i; ?>" size = '30' readonly>
								</div>
								<div class="col-3 mr-5">
									<input type="text" class="form-control" name="name" value="<?= $value->student_name; ?>" size = '30' readonly>
								</div>
								<div class="col-3">
									<input type="text" class="form-control" name="regno" value='<?= strtoupper($value->register_no); ?>' size = '30' readonly>
								</div>

								<div class="col-3">
									<input type="text" class="form-control" name="att"  placeholder="P/A" required="">
								</div>
							</div>	
							<?php $i++; ?>
						<?php } ?>	
					<?php } ?>	
				</div>


				<div class="row mt-5 justify-content-center">
					<input class="btn btn-primary" type="submit">
				</div>
				<input type="hidden" id='cls' value="<?php echo  $_GET['cls'];?>">
			</form>
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