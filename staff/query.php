<?php 
$get_query = file_get_contents('https://attendance-flask-app.herokuapp.com/get_query');
$query_details = json_decode($get_query);
	$query_count = 0;
	foreach ($query_details as $key => $value) {
		if ($value->staff == $_GET['staff_id']){
			$query_count = 1;
			break;
		}
	}
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
				<li class="nav-item">
					<a class="nav-link" href="add_student.php?staff_id=<?php echo $_GET['staff_id'];?>&cls=<?php echo $_GET['cls'];?>">Add student</a>
				</li>
				<li class="nav-item active">
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
	<div class="container pt-3">
		<div class="row mt-5 w-100">
			<form class=" border border-light w-100"  action="javascript:add_query()" >
				<p class="h4 m-2">Enter your query here :</p>
				<div class="row m-3">
					<textarea class="form-control" id='query' rows="4" required=""></textarea>
				</div>
				<div class="d-flex flex-row ml-3">
					<div class="p-2">
						<button class="btn btn-primary btn-default" type="submit">Submit</button>
					</div>
					<div class="p-2">
						<button class="btn btn-danger btn-default" onclick="reset()">Clear</button>
					</div>
				</div>
				<input type="hidden" id='staff_id' value="<?php echo $_GET['staff_id']; ?>">	
			</form>
		</div>
		<p class="h4 mt-3 ">Posted Queries :</p>
		<div class="row table-responsive w-100" id="pending" style="max-height: 250px; overflow-y: auto; position: relative;">
			
			<table id="myQueryTable" class="mb-0 table table-bordered table-hover table-light table-striped" >
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Query</th>
						<th scope="col">Date</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php $i=1; ?>
					
					<?php foreach ($query_details as $key => $value) { ?>
						
						<?php if ($value->staff == $_GET['staff_id']) { ?>
							<tr>
								<th scope="row"><?php echo $i; ?></th>
								<td><?php echo $value->query; ?></td>
								<td><?php echo $value->date; ?></td>
								<td><?php if ($value->status == 0){ ?>
									<p class="mb-0 text-danger font-weight-bold">Pending</p> <?php } else {?>
										<p class="mb-0 text-success font-weight-bold	">Resolved</p> <?php } ?>
									</td>
								</tr>
								<?php $i++; ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table> 

				<?php if ($query_count == 0) { ?>
					<p class="p-2 mb-2 bg-light text-dark d-flex justify-content-center">No Records Found</p>
				<?php } ?>
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